
      
    <form id="pinDetailForm" method="POST" enctype="multipart/form-data" action="{{ route('admin.user-pin.update' , ['id' => $record->id ]) }}">
        <div class="more-detail">
            <p class="font-18 mb-3">More Details</p>
            <div class="row">
              {{ csrf_field() }}

                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="">Current Status</label>
                        <select class="form-select" aria-label="Default select example" name="pin_status_id">
                        <option value="">Select Status</option>
                        @if( count($companyStatuses) )
                                    @foreach( $companyStatuses as $companyStatus )
                                        <option {{ $record->pin_status_id == $companyStatus->id ? 'selected' : '' }} value="{{ $companyStatus->id }}">{{ $companyStatus->title }}</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="">Assign To</label>
                        <select class="form-select" aria-label="Default select example" name="assignee_user_id">
                        <option value="">Select User</option>
                                @if( count($companyUsers) )
                                    @foreach( $companyUsers as $companyUser )
                                        <option {{ $record->assignee_user_id == $companyUser->id ? 'selected' : '' }} value="{{ $companyUser->id }}">{{ $companyUser->name }}({{ $companyUser->email }})</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">House Number</label>
                        <input type="text" name="house_number" value="{{ $record->house_number }}" class="form-control" placeholder="House Number">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">Street Name</label>
                        <input id="autocomplete" name="house_address" class="form-control" required onfocus="initAutocomplete()" placeholder="Enter your address" type="text" value="{{ $record->house_address }}"/>
                              <input type="hidden" id="latitude" value="{{ $record->latitude }}" name="latitude"/>
                              <input type="hidden" id="longitude" value="{{ $record->longitude }}" name="longitude"/>

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">Unit</label>
                        <input type="text" name="unit" value="{{ $record->unit }}" class="form-control" placeholder="Unit">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">City</label>
                        <input type="text" name="city" value="{{ $record->city }}" class="form-control" placeholder="City">

                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group map-select">
                                <label for="exampleInputEmail1">State</label>
                              <input type="text" name="state" value="{{ $record->state }}" class="form-control" placeholder="State">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group map-select">
                                <label for="exampleInputEmail1">Zip Code</label>
                              <input type="text" name="zipcode" value="{{ $record->zipcode }}" class="form-control" placeholder="Zip Code">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" value="{{ $record->name }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" value="{{ $record->phone }}" class="form-control phone" placeholder="Phone (+1-1256322365)">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="email" name="email" value="{{ $record->email }}" class="form-control" placeholder="Email">
                    </div>
                </div>
            </div>
            <p class="font-18 mb-3">Appointment</p>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                    <label class="font-14 color-4e5164 font-600">Appointment title</label>
                    <input type="text" name="appointment_title[]" value="{{ !empty($record->appointment) ? $record->appointment->title : '' }}" class="form-control" placeholder="Appointment title">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group map-select">
                        <label for="">Assign To</label>
                        <select class="form-select" aria-label="Default select example" name="assign_to_calender[]">
                        <option value="">Select User</option>
                                @if( count($companyUsers) )
                                    @foreach( $companyUsers as $companyUser )
                                        <option {{ $record->assignee_user_id == $companyUser->id ? 'selected' : '' }} value="{{ $companyUser->id }}">{{ $companyUser->name }}({{ $companyUser->email }})</option>
                                    @endforeach
                                @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group map-select">
                                <label for="exampleInputEmail1">Start Date Time</label>
                                <input type="text" name="start_datetime[]" value="{{ !empty($record->appointment) ? date("Y-m-d\TH:i:s", strtotime($record->appointment->start_datetime)) : '' }}" class="form-control" placeholder="Start Date time"/>
                                <span class="input-group-addon calender-icon">
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group map-select">
                                <label for="exampleInputEmail1">End Date Time</label>
                                <input type="text" name="end_datetime[]" class="form-control" value="{{ !empty($record->appointment) ? date("Y-m-d\TH:i:s", strtotime($record->appointment->end_datetime)) : '' }}" placeholder="End Date time"/>
                                <span class="input-group-addon calender-icon" >
                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group map-select">
                        <label for="">Note </label>
                        <textarea class="form-control" name="appointment_notes[]" rows="3">{{ !empty($record->appointment) ? $record->appointment->notes : '' }}</textarea>

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="more-detail-footer text-end">
                    <button type="button" class="filter-btn-without-icon bg-red delete_pin me-2"  id="{{ $record->id }}">
                        Delete Pin
                    </button>
                    <button type="button" class="filter-btn-without-icon bg-orange close_pin_detail me-2 hide_pin_detail" >
                        Close
                    </button>
                    <button type="submit" class="filter-btn-without-icon bg-btn-blue">
                        Save Changes
                    </button>
            <!-- <button type="button" class="map-filter-btn bg-red me-2">
                <ul class=" d-flex align-items-center justify-content-center delete_pin" id="{{ $record->id }}">
                    <li class="me-2"> <img src="{{ URL::to('assets/img/delete-icon.png') }}" alt="" class="img-fluid" /></li>
                    <li>Delete Pin</li>
                </ul>
            </button>
            <button type="button" class="filter-btn-without-icon bg-light-grey me-2 hide_pin_detail">
                Cancel
            </button>
            <button type="submit" class="filter-btn-without-icon bg-orange btn-save">
                Save Changes
            </button> -->
        </div>
    </form>
<!-- <div class="col-12 col-md-4 offset-md-3">
    <div class="d-none">
        <div class="pin-detail">
            <div>
                <p class="font-18">Territories</p>
            </div>
            <div>
                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
            </div>
        </div>
        <div class="detail-body territories-detail">
            <div class="input-sreach">
                <input type="text" placeholder="Search Territory Name" class="">
                <img src="{{ URL::to('assets/img/search-normal.png') }}" alt="" class="img-fluid" />
            </div>
            <p class="font-18 border-bottom pb-2 mt-4">Territories (3)</p>
            <div class="territories-check">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label color-light" for="flexCheckChecked">
                        Select All Territories
                    </label>
                </div>
            </div>
            <div class="territories-check d-flex align-items-center justify-content-between border-bottom pb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label " for="flexCheckChecked">
                        ABC Territory 001
                    </label>
                </div>
                <div>
                    <img src="{{ URL::to('assets/img/setting.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="territories-check d-flex align-items-center justify-content-between border-bottom pb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label " for="flexCheckChecked">
                        Unit 4 Sales Territory
                    </label>
                </div>
                <div>
                    <img src="{{ URL::to('assets/img/setting.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="territories-check d-flex align-items-center justify-content-between border-bottom pb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label " for="flexCheckChecked">
                        Union Territory Sales Batch
                    </label>
                </div>
                <div>
                    <img src="{{ URL::to('assets/img/setting.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="territories-check d-flex align-items-center justify-content-between border-bottom pb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label " for="flexCheckChecked">
                        Bushwhack Sales Territory Area
                    </label>
                </div>
                <div>
                    <img src="{{ URL::to('assets/img/setting.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="territories-check d-flex align-items-center justify-content-between border-bottom pb-1">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label " for="flexCheckChecked">
                        ABC Territory 001
                    </label>
                </div>
                <div>
                    <img src="{{ URL::to('assets/img/setting.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="filter-btn-without-icon bg-orange">
                    Search
                </button>
            </div>
        </div>
    </div>
    <div class="user-territories d-none">
        <div class="user-territories-header">
            <p class="font-18">ABC</p>
        </div>
        <div class="terrain-box">
            <p class="font-16 mb-3">Universe</p>
            <p class="font-14 color-light">26</p>
            <p class="font-16 mt-3">Terrain</p>
            <div class="d-flex align-items-center">
                <div>
                    <div class="terrain-img">
                        <img src="{{ URL::to('assets/img/terrain-img.png') }}" alt="" class="img-fluid mt-4" />

                    </div>
                    <p class="text-center mt-2">Street</p>
                </div>
                <div>
                    <div class="terrain-img">
                        <img src="{{ URL::to('assets/img/terrain-img.png') }}" alt="" class="img-fluid mt-4" />

                    </div>
                    <p class="text-center mt-2">Street</p>
                </div>
                <div>
                    <div class="terrain-img">
                        <img src="{{ URL::to('assets/img/terrain-img.png') }}" alt="" class="img-fluid mt-4" />

                    </div>
                    <p class="text-center mt-2">Street</p>
                </div>
            </div>
        </div>
        <div class="territories-tabs">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Active Users</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Area Activity</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="tab-pane-territories mt-3">
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-img">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div class="ms-3">
                                    <p>Michael Wong</p>
                                    <p class="font-12 color-light">12/5/2023</p>
                                </div>
                            </div>
                            <div>
                                <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="tab-pane-territories mt-3">
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-para ">
                                    <p class="bg-orange"></p>
                                </div>
                                <div class="ms-3">
                                    <p>Approved</p>

                                </div>
                            </div>
                            <div>
                                <p class="font-14 color-light">02</p>
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-para ">
                                    <p class="bg-pink"></p>
                                </div>
                                <div class="ms-3">
                                    <p>Not Approved</p>

                                </div>
                            </div>
                            <div>
                                <p class="font-14 color-light">02</p>
                            </div>
                        </div>
                        <div class="active-territories-user d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="territories-user-para ">
                                    <p class="bg-aqua"></p>
                                </div>
                                <div class="ms-3">
                                    <p>Lost Opportunities</p>

                                </div>
                            </div>
                            <div>
                                <p class="font-14 color-light">02</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        -->