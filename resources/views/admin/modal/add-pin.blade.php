<div class="modal fade new-modal" id="addPin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg add-modal" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title font-24" id="exampleModalLabel">Add Pin</h5>
            <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="add_pin_form" method="POST" autocomplete="off" enctype="multipart/form-data"
            action="{{ env('APP_URL') . '/admin/add-pin' }}">
            {{ csrf_field() }}
            <input type="hidden" id="territory_id" name="territory_id" value="0">
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div id="add_pin_error" class="error_div"></div>
                     <div id="add_pin_error" class="success_div"></div>
                  </div>
               </div>
               <div class="row ">
                  <div class="form-group col-md-6">
                     <label class="font-14 color-4e5164 font-600">Current Status</label>
                     <select name="pin_status_id" class="form-control" required>
                        <option value="">Select Status</option>
                        @if (count($companyStatuses))
                        @foreach ($companyStatuses as $companyStatus)
                        <option value="{{ $companyStatus->id }}">{{ $companyStatus->title }}</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label class="font-14 color-4e5164 font-600">Assign to</label>
                     <select name="assignee_user_id" class="form-control" required>
                        <option value="">Select User</option>
                        @if (count($companyUsers))
                        @foreach ($companyUsers as $companyUser)
                        <option value="{{ $companyUser->id }}">{{ $companyUser->name }} ({{ $companyUser->email }})</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="house_number" value="" class="form-control" required
                           placeholder="House Number">
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input id="autocomplete" autocomplete="false" name="house_address" class="form-control" required
                           onfocus="initAutocomplete()" placeholder="House Address" type="text" value="" />
                        <input type="hidden" id="latitude" name="latitude" />
                        <input type="hidden" id="longitude" name="longitude" />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="unit" value="" class="form-control" placeholder="Unit">
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="city" value="" class="form-control" placeholder="City">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="state" value="" class="form-control" placeholder="State">
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="zipcode" value="" class="form-control" placeholder="Zip Code">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="name" value="" class="form-control" placeholder="Name (default)">
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="email" name="email" value="" class="form-control" placeholder="Email">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="form-group">
                        <input type="text" name="phone" value="" class="form-control phone"
                           placeholder="Phone">
                     </div>
                  </div>
               </div>
               <div class="row">
            @if (!empty($getCustomFields))
    @foreach ($getCustomFields as $customFields)
        @if (is_object($customFields) && isset($customFields->label))
            <div class="form-group col-md-6">
                <label>{{ $customFields->label }}</label>
                @if ($customFields->field_type == 'text')
                    <input type="text" name="custom_fields[{{ $customFields->id }}]" value=""
                        class="form-control" placeholder="{{ $customFields->label }}">
                @else
                    <textarea class="form-control" name="custom_fields[{{ $customFields->id }}]"></textarea>
                @endif
            </div>
        @endif
    @endforeach
@endif

               </div>
               <div class="row">
                  <div class="form-group col-md-12">
                     <h4 class="mt-2 font-weight-bold color-black">Appointments</h4>
                  </div>
                  <div class="form-group col-md-6">
                     <label class="font-14 color-4e5164 font-600">Appointment title</label>
                     <input type="text" name="appointment_title[]" value="" class="form-control"
                        placeholder="Appointment title">
                  </div>
                  <div class="form-group col-md-6">
                     <label class="font-14 color-4e5164 font-600">Assign to calendar</label>
                     <select name="assign_to_calender[]" class="form-control">
                        <option value="">Select User</option>
                        @if (count($companyUsers))
                        @foreach ($companyUsers as $companyUser)
                        <option value="{{ $companyUser->id }}">{{ $companyUser->name }}({{ $companyUser->email }})
                        </option>
                        @endforeach
                        @endif
                     </select>
                  </div>
                  <div class="form-group col-md-4">
                     <label class="font-14 color-4e5164 font-600">Start Date Time</label>
                     <div class="input-group date id_0">
                        <input type="text" name="start_datetime[]" class="form-control" placeholder="Start Date time"/>
                        <span class="input-group-addon calender-icon">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        </span>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                     <label class="font-14 color-4e5164 font-600">End Date Time</label>
                     <div class="input-group date id_0">
                        <input type="text" name="end_datetime[]" class="form-control" placeholder="End Date time"/>
                        <span class="input-group-addon calender-icon">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        </span>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                     <label class="font-14 color-4e5164 font-600">Duration</label>
                     <input type="number" name="duration[]" value="" class="form-control" placeholder="Duration">
                  </div>
                  <div class="form-group col-md-12">
                     <textarea class="form-control" name="appointment_notes[]" rows="6" placeholder="Note"></textarea>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
                     <button type="button" class="filter-btn-without-icon bg-orange" data-bs-dismiss="modal">
                      Cancel
                    </button>
                    <button type="submit" class="filter-btn-without-icon bg-btn-blue">
                      Confirm
                    </button>
               
            </div>
         </form>
      </div>
   </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places,geometry"></script>
<script src="{{ asset('assets/admin/js/autocomplete-address.js') }}"></script>
<script>
   ajax_form_submitted('#add_pin_form', '#add_pin_error', '#add_pin_error');
   $('.phone').mask('(000) 000-0000');
   $('.id_0').datetimepicker({
      "allowInputToggle": true,
      "showClose": true,
      "showClear": true,
      "showTodayButton": true,
      "format": "MM/DD/YYYY hh:mm:ss A",
   });
</script>