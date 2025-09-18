@extends('admin.master')
@section('content')
<section class="map-sec-bg">
        <div class="row">
            <div class="col-12">
                <div id="map"></div>
            </div>
            <form id="search_pin_form" method="get">
            <div class="col-12">
                <div class="map-sec-header map-header">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="font-22 white-space me-5 ">Select User</h2>
                        </div>
                        <div class="form-group new-modal new-input user-select" >
                            <select data-placeholder="Select User" name="user_id" class="select2 form-control form-control2">
                              <option value=""></option>
							         @if( count($salesRepresentative) )
                                 @foreach( $salesRepresentative as $sr )
                                    <option value="{{ $sr->id }}">{{ $sr->name }}</option>
                                 @endforeach
                              @endif
                           </select>
                        </div>
                        <div class="input-group date user-select" id="datepicker">
                            <!-- <input type="text" class="form-control" id="date"/> -->
                            <select name="date" id="tracking_date" class="form-control date-piker-select">
                              <option value="">-- Select Tracking Date -- </option>
                           </select>  
                            <span class="input-group-append">
                                <span class="input-group-text bg-light d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                       
                       
                    </div>
                    <div class="d-flex align-items-center">
                       
                        <div class="me-3">
                        <div class="input-group map-input">
                            <input type="" name="" placeholder="Search...">
                        </div>
                    </div>
                        <div class="me-3">
                            <button type="submit" class="filter-btn-without-icon bg-orange" >
                                Search
                           </button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
         </div>
</div>
@push('scripts')
<script defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places,drawing&callback=initMap"></script>
<script src="{{ asset('assets/admin/js/user-tracking.js') }}"></script>
<script>
   $('.user_pin_filter').click( function(e){
      e.preventDefault();
      if( $('.box').find('.d-none').length > 0 ){
         $('#pills-tabContent').removeClass('d-none');
      } else {
         $('#pills-tabContent').addClass('d-none');
      }
   })
   $( function() {
    $( "#datepicker" ).datepicker();
  } );
 
</script>
@endpush
@endsection