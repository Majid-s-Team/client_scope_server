<div class="modal fade new-modal" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="data-target" aria-hidden="true">
    <div class="modal-dialog modal-lg add-modal" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-24" id="editStatusTitle">Update Status</h5>
            <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="editStatusForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.edit-status') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $pin->id }}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="editStatusFormError" class="error_div"></div>
                        <div id="editStatusFormSuccess" class="success_div"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Title</label>
                        <input type="text" name="title" value="{{$pin->title ? $pin->title : ''}}" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group col-md-6">
                        <label>KPI Group</label>
                        <select name="kpi_group_id[]" multiple class="form-control text-capitalize select2" required>
                            <option value="">Select KPI Group</option>
                            @if( count($kpi_groups) )
                                @foreach( $kpi_groups as $kpi )
                                    <option {{ $kpi->is_selected ? 'selected' : '' }} class="text-capitalize" value="{{ $kpi->id }}">{{ $kpi->title }}</option>
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
                                    <option {{ $pin->metric_id == $metric->id ? 'selected' : '' }} class="text-capitalize" value="{{ $metric->id }}">{{ $metric->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Custom Metric Title</label>
                        <input type="text" name="custom_metric_title" class="form-control" value="{{ $pin->custom_metric_title }}" placeholder="Custom Metric Title">
                    </div>
                    <div class="form-group col-12">
                        <label class="font-20">Pin Colour</label>
                        <div class="d-flex align-items-center flex-wrap">
                            <input type="hidden" name="color" value="{{ $pin->color }}">
                            <input type="hidden" name="type" value="pin">
                            <input type="hidden" id="edit_status_image_url" name="image_url" value="">
                            @foreach( config('constants.PIN_STATUS_IMAGES') as $color => $pin_status_images)
                                <div data-payload="{{ $color . '|' . asset($pin_status_images) }}" class="{{ $pin->image_url == URL::to($pin_status_images) ? 'pin-item-active' : 'pin-item' }} text-center _select_status">
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
            Close
                    </button>
                    <button type="submit" class="filter-btn-without-icon bg-btn-blue">
                    Update Status 
                    </button>
               
            </div>
        </form>    
    </div>
    </div>
</div>
<script src="//www.color-blindness.com/color-name-hue-tool/js/ntc.js"></script>
<script>
    ajax_form_submitted('#editStatusForm','#editStatusFormError','#editStatusFormSuccess');
    
    let edit_payload = $('.pin-item-active').data('payload');
    $('#edit_status_image_url').val(edit_payload);

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