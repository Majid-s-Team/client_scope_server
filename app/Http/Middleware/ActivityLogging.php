<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class ActivityLogging
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
public function handle($request, Closure $next, ...$guards)
{
    $response = $next($request);

    if (!$request->isMethod('get')) {
        $data = $request->except([
            'password', 'current_password', 'new_password', 'confirm_password'
        ]);

        // dd($guards);
        \App\Models\ActivityLogging::create([
            'user_id'      => Auth::guard($guards[0] ?? 'web')->check()
                                ? Auth::guard($guards[0] ?? 'web')->id()
                                : 0,
            'user_type'    => $guards[0] ?? 'web',
            'action'       => optional($request->route())->getName(),
            'user_request' => json_encode($data),
            'user_agent'   => $request->header('User-Agent'),
            'ip_address'   => $request->ip(),
            'created_at'   => Carbon::now(),
        ]);
    }

    return $response;
}

}
