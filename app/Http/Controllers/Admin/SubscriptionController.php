<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class SubscriptionController extends Controller
{
    private $_ajax_response, $_data;

    public function __construct()
    {
        $this->_ajax_response = [
            'error'        => false,
            'message'      => '',
            'data'         => [],
            'redirect'     => false,
            'redirect_url' => '',
        ];
        $this->_data = [];
    }

    public function index(Request $request)
    {
        $data['UserSubscriptions'] = UserSubscription::getUserSubscription($request->all());
        return view('admin.subscription.index', $data);
    }

    public function update(Request $request)
    {
        UserSubscription::find($request->subscription_id)
            ->update(['expire_date' => $request->expire_date, 'status' => $request->status]);

        $this->_ajax_response['error']        = 0;
        $this->_ajax_response['message']      = 'Record has been updated.';
        $this->_ajax_response['data']         = [];
        $this->_ajax_response['redirect']     = true;
        $this->_ajax_response['redirect_url'] = url()->previous();

        return response()->json($this->_ajax_response);
    }

    public function upgradePackage(Request $request)
    {
        $current_user = get_user()->toArray();

        $validator = Validator::make($request->all(), [
            'subscription_package_id' => 'required',
            'stripeToken'             => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        // subscription package
        $package = DB::table('subscription_packages')->where('id', $request['subscription_package_id'])->first();
        if (! isset($package->id)) {
            return redirect()->back()->with('error', 'Invalid package id');
        }
        
        // get total user
        $total_user = DB::table('user_company_mapping')
        ->where('company_user_id', $current_user['user_company']['company_user_id'])
        ->count();
        
        // charge amount
        $charge_amount = round($package->month_per_user_amount * $total_user, 2);
                        // dd($charge_amount,'s');

        // Stripe charge
        try {
            // Stripe::setApiKey(config('services.stripe.secret'));
            
            // dd($request->toArray());
            $charge = Charge::create([
                'amount'      => $charge_amount * 100, // cents
                'currency'    => 'usd',
                'source'      => $request['stripeToken'],
                'description' => 'package: ' . $package->title . ' companyEmail#' . $current_user['user_company']['email'],
            ]);
// dump($charge);
            $chargeResponse = [
                'code'    => 200,
                'message' => 'Charge successful',
                'data'    => ['charge' => $charge],
            ];
        } catch (\Exception $e) {
            $chargeResponse = [
                'code'    => 500,
                'message' => $e->getMessage(),
                'data'    => [],
            ];
        }
        
        if ($chargeResponse['code'] != 200) {
            return redirect()->back()->with('error', $chargeResponse['message']);
        }

        // update old subscriptions
        UserSubscription::where('company_user_id', $current_user['user_company']['company_user_id'])
            ->update(['status' => 'expired']);

        // insert new subscription
        $user_subscription_data = [
            'company_user_id'          => $current_user['user_company']['company_user_id'],
            'user_id'                  => $current_user['id'],
            'gateway_type'             => 'stripe',
            'gateway_transaction_id'   => $chargeResponse['data']['charge']->id,
            'amount'                   => $charge_amount,
            'subscription_package_id'  => $request['subscription_package_id'],
            'expire_date'              => Carbon::now()->addMonth(),
            'status'                   => 'active',
            'created_at'               => Carbon::now(),
        ];
        UserSubscription::create($user_subscription_data);

        return redirect()->back()->with('success', 'Your subscription has been upgraded successfully');
    }
}
