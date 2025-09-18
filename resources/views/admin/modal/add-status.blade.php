<div class="modal fade new-modal" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="addStatus" aria-hidden="true">
    <div class="modal-dialog modal-lg add-modal" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title font-24" id="addStatusTitle">Add Status</h5>
             <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <form id="addStatusForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.add-status') }}">
             <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
                   <div class="col-md-12">
                      <div id="addStatusFormError" class="error_div"></div>
                      <div id="addStatusFormSuccess" class="success_div"></div>
                   </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                      <label>Status Name</label>
                      <input type="text" name="title" class="form-control" placeholder="Status Name" required>
                   </div>
                   <div class="form-group col-md-6">
                      <label>KPI Group</label>
                      <select name="kpi_group_id[]" multiple class="form-control text-capitalize select2" required>
                         <option value="">Select KPI Group</option>
                         @if( count($kpi_groups) )
                            @foreach( $kpi_groups as $kpi )
                              <option class="text-capitalize" value="{{ $kpi->id }}">{{ $kpi->title }}</option>
                            @endforeach
                         @endif
                      </select>
                   </div>
                   <div class="form-group col-md-6">
                      <label>Company Metric</label>
                      <select name="metric_id" class="form-control text-capitalize">
                         <option value="">Select Metric</option>
                         @if( count($metrices) )
                            @foreach( $metrices as $metric )
                               <option class="text-capitalize" value="{{ $metric->id }}">{{ $metric->title }}</option>
                            @endforeach
                         @endif
                      </select>
                   </div>
                   <div class="form-group col-md-6">
                      <label>Custom Metric Title</label>
                      <input type="text" name="custom_metric_title" class="form-control" value="" placeholder="Custom Metric Title">
                   </div>
                   <div class="form-group col-12">
                     <label class="font-20">Pin Colour</label>
                        <div class="d-flex align-items-center flex-wrap">
                           <input type="hidden" name="type" value="pin">
                           <input type="hidden" id="status_image_url" name="image_url" value="">
                           @foreach( config('constants.PIN_STATUS_IMAGES') as $color => $pin_status_images)
                              <div data-payload="{{ $color . '|' . asset($pin_status_images) }}" class="pin-item text-center _select_status">
                                 <div class="pin-img">
                                    <img src="{{ asset($pin_status_images) }}" />
                                 </div>
                                 <p data-code="{{ $color }}" class="_color_code"></p>
                              </div>
                           @endforeach   
                        </div>
                   </div>
                   <div class="form-group col-md-6">
                      <div id="icon-container" class="img-responsive d-none form-control">
                         <img style="width: 15px; height:15px" id="status-icon" src="#" alt="your image" />
                      </div>
                   </div>
                </div>
             </div>
             <div class="modal-footer"> 
             <button type="button" class="filter-btn-without-icon bg-orange" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="filter-btn-without-icon bg-btn-blue">
                        Save changes
                    </button>
             </div>
          </form>
       </div>
    </div>
 </div>
 @push('scripts')
 <script src="//www.color-blindness.com/color-name-hue-tool/js/ntc.js"></script>
 <script>
    ajax_form_submitted('#addStatusForm','#addStatusFormError','#addStatusFormSuccess');
    $('._color_code').each( function(){
         var color_code = $(this).data('code');
         let result = ntc.name(color_code);
         $(this).html(result[1]);
    })
    $('._select_status').click( function(e){
         e.preventDefault();
         let payload = $(this).data('payload');
         $('#status_image_url').val(payload);
         $('._select_status').removeClass('pin-item-active')
         $('._select_status').addClass('pin-item')
         $(this).removeClass('pin-item')
         $(this).addClass('pin-item-active')
    })
 </script>
 @endpush