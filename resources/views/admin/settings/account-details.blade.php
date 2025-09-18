@extends('admin.master')
@section('content')


<section class="content-area">
   <div class="account-details">
        <div class="box-account">
            <div class="row">
                <div class="col-12">
                    <h2 class="font-18">Account Details</h2>
                </div>
                <div class="col-12 col-md-6">
                    <div class="acc-box d-flex align-items-center justify-content-between mt-3">
                        <div>
                            <p>Product Name:</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="font-12 color-light me-3"> {{ $user_package['subscription_package']['title'] }}</span>
                            <button class="filter-btn-without-icon bg-orange" data-bs-toggle="modal" data-bs-target="#package_modal">Upgrade</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="acc-box d-flex align-items-center justify-content-between mt-3">
                        <div>
                            <p>Subscription State:</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="font-12 color-light me-3">{{ strtotime(date('Y-m-d')) > strtotime($user_package['expire_date']) ? 'Expired' : 'Active' }}
                            </span>
                            <button class="filter-btn-without-icon bg-orange">Contact</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="acc-box d-flex align-items-center justify-content-between mt-3">
                        <div>
                            <p>Subscription Expiry Date:</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <p class="font-12 color-light"> {{ $user_package['expire_date'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="acc-box d-flex align-items-center justify-content-between mt-3">
                        <div class="d-flex align-items-center ">
                            <p>Next Charge:</p><span class="font-12 color-light">(total does not include your <br>
                            current invited or trialling users)</span>
                        </div>
                        <div class="d-flex align-items-center">
                            
                            <p class="font-12 color-light"> ${{ round($total_users * $user_package['subscription_package']['month_per_user_amount'] ,2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a data-name="{{ route('admin.custom-fields') }}" href="{{ route('admin.custom-fields') }}">
                    <img src="{{ URL::to('assets/img/setting-pin.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Pin Settings</p>
                    <p class="font-12 color-light mt-2 mb-3">These are the fields that are being used 
                    by default</p>
                </a>
                </div>
            </div>
            
            <div class="col-12 col-md-3">
                <div class="setting-box">
                    <a data-name="{{ route('admin.manage-user') }}" href="{{ route('admin.manage-user') }}">
                    <img src="{{ URL::to('assets/img/users-management.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Users Management</p>
                    <p class="font-12 color-light mt-2 mb-3">TManage your Users and Edit there Roles and
                    Statuses, also Add new Users</p>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a data-name="{{ route('admin.import-history') }}" href="{{ route('admin.import-history') }}">
                    <img src="{{ URL::to('assets/img/import-data.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Import Data</p>
                    <p class="font-12 color-light mt-2 mb-3">Import User Data </p>
                </a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a data-name="{{ route('admin.history-data') }}" href="{{ route('admin.history-data') }}">
                    <img src="{{ URL::to('assets/img/import-data.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Import History</p>
                    <p class="font-12 color-light mt-2 mb-3">Import User Data  History</p>
                </a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a data-name="{{ route('admin.faq') }}" href="{{ route('admin.faq') }}">
                    <img src="{{ URL::to('assets/img/faq-icon.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Frequently Asked Questions</p>
                    <p class="font-12 color-light mt-2 mb-3">Manage your Users and Edit there Roles and
                    Statuses, also Add new Users</p>
                </a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a  href="{{ URL::to('admin/terms-condition/index') }}">
                    <img src="{{ URL::to('assets/img/privacy-policy.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Privacy Policy</p>
                    <p class="font-12 color-light mt-2 mb-3">Import User Data and History</p>
                </a>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="setting-box">
                <a  href="{{ URL::to('admin/privacy-policy/index') }}">
                    <img src="{{ URL::to('assets/img/terms-icon.png') }}" alt="" class="img-fluid" />
                    <p class="font-18 mt-3">Terms and Conditions</p>
                    <p class="font-12 color-light mt-2 mb-3">Manage your Users and Edit there Roles and
                    Statuses, also Add new Users</p>
                </div>
               </a>
            </div>
            
        </div>
   </div>
   <div id="package_modal" class="modal fade" role="dialog"  tabindex="-1" aria-labelledby="package_modal" aria-hidden="true">
    <form method="post" action="{{ route('admin.upgrade-package') }}" id="payment-form">
        {{ csrf_field() }}
        <input type="hidden" id="total_user" name="total_user" value="{{ $total_users }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="package_modal">Subscription</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Subscription Package <a target="_blank"
                                href="http://ec2-13-58-65-214.us-east-2.compute.amazonaws.com#clientscopepricing">( View
                                Package Detail )</a></label>
                        <select required name="subscription_package_id" class="form-control">
                            <option value=""> -- Select Package -- </option>
                            @if( count($subscriptionPackages) )
                            @foreach( $subscriptionPackages as $subscriptionPackage )
                            <option data-price="{{ $subscriptionPackage->month_per_user_amount }}"
                                value="{{ $subscriptionPackage->id }}">{{ $subscriptionPackage->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Charge Amount</label>
                        <input type="text" readonly name="charge_amount" class="form-control" value="0">
                    </div>
                    <div class="form-group">
                        <label for="card-element">Credit or debit card</label>
                        <div id="card-element"></div>
                        <div style="color:red;" id="card-errors" role="alert"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-orange">Submit</button>
                </div>
            </div>
        </div>
</div>
</form>
</div>
</section>

 @push('scripts')

<script src="https://js.stripe.com/v3/"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('assets/admin/js/chat.js') }}"></script> -->
<script>
$('select[name="subscription_package_id"]').change(function() {
    let price = $('option:selected', this).attr('data-price');
    let total_user = $('#total_user').val();
    $('input[name="charge_amount"]').val((parseFloat(price) * parseInt(total_user)));
})


var stripe = Stripe('{{ env("STRIPE_PUBLISHED_KEY") }}');
var elements = stripe.elements();
// Create an instance of the card Element.
var card = elements.create('card');
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the customer that there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token) {
    $('#overlay').show();
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}
</script>

<script>
	// $('#tooltip').tooltip()
</script>
<script>
    // JavaScript to show and hide the modal
    function showModal() {
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('modal').style.display = 'block';
    }

    function hideModal() {
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('modal').style.display = 'none';
    }
  </script>
@endpush @endsection