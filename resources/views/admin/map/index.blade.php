@extends('admin.master')
@section('content')

    <section class="map-sec-bg">
        <div class="row">
            <div class="col-12">
                <div id="map">
                </div>
            </div>
            <div class="col-12">
                <div class="map-sec-header">
                    <div>
                        <h2 class="font-22">Maps</h2>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <div class="input-group map-input">
                                <input type="" name="" placeholder="Search...">
                            </div>
                        </div>
                        <div class="me-3">
                            <button type="submit" class="map-filter-btn bg-orange" id="pills-filter-tab">
                                <ul class=" d-flex align-items-center justify-content-center">
                                    <li class="me-2"> <img src="{{ URL::to('assets/img/btn-filter.png') }}" alt=""
                                            class="img-fluid" /></li>
                                    <li>Filters</li>
                                </ul>
                            </button>
                        </div>
                        <div class="me-3">
                            <button type="submit" class="map-filter-btn bg-grey" id="pills-terr-tab">
                                <ul class=" d-flex align-items-center justify-content-center">
                                    <li class="me-2"> <img src="{{ URL::to('assets/img/territories-img.png') }}" alt=""
                                            class="img-fluid" /></li>
                                    <li>Territories</li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 ">
            <div class="col-12 col-md-5">
                <div class="pin-detail d-none">
                    <div>
                        <p class="font-18">Pin Details</p>
                    </div>
                    <div>
                        <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="detail-body d-none">
                    <div class="detail-head">
                        <div class="d-flex  justify-content-between">
                            <div>
                                <p class="font-18">Test Sale</p>
                                <p class="color-light mt-2">7460 Redwood Blvd, Novato, CA 94945</p>
                            </div>
                            <div>
                                <button type="submit" class="filter-btn-without-icon bg-orange">
                                    Filters
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <p class="color-light mt-3 mb-1">Status</p>
                                <span class="table-circle cirlce-orange"></span><span class="ms-2">Sale</p>
                            </div>
                            <div class="col-4">
                                <p class="color-light mt-3 mb-1">Status</p>
                                <p>12-15-2023, 17:30</p>
                            </div>
                        </div>
                    </div>
                    <p class="text-center mt-2 color-light">View Less</p>
                    <div class="more-detail">
                        <p class="font-18 mb-3">More Details</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="">Current Status</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected><span class="table-circle color-orange"></span> Sale</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="">Assign To</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Team Lead (teamlead@yopmail.com)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">House Number</label>
                                    <input class="form-control" placeholder="7460" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">Street Name</label>
                                    <input class="form-control" placeholder="Redwood Blvd" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">Unit</label>
                                    <input class="form-control" placeholder="Sale" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">City</label>
                                    <input class="form-control" placeholder="Novato" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">

                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group map-select">
                                            <label for="exampleInputEmail1">State</label>
                                            <input class="form-control" placeholder="California" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group map-select">
                                            <label for="exampleInputEmail1">Zip Code</label>
                                            <input class="form-control" placeholder="94945" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input class="form-control" placeholder="Emma Wallace" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input class="form-control" placeholder="Emma Wallace" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input class="form-control" placeholder="Emma Wallace" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <p class="font-18 mb-3">More Details</p>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="">Current Status</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected><span class="table-circle color-orange"></span> Sale</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group map-select">
                                    <label for="">Assign To</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Team Lead (teamlead@yopmail.com)</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group map-select">
                                            <label for="exampleInputEmail1">State</label>
                                            <input class="form-control" placeholder="California" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group map-select">
                                            <label for="exampleInputEmail1">Zip Code</label>
                                            <input class="form-control" placeholder="94945" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group map-select">
                                    <label for="">Note </label>
                                    <textarea name="" id="" class="w-100" row="10"></textarea>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="more-detail-footer text-end">
                        <button type="submit" class="map-filter-btn bg-red me-2">
                            <ul class=" d-flex align-items-center justify-content-center">
                                <li class="me-2"> <img src="{{ URL::to('assets/img/delete-icon.png') }}" alt=""
                                        class="img-fluid" /></li>
                                <li>Delete Pin</li>
                            </ul>
                        </button>
                        <button type="submit" class="filter-btn-without-icon bg-light-grey me-2">
                            Cancel
                        </button>
                        <button type="submit" class="filter-btn-without-icon bg-orange">
                            Save Changes
                        </button>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4 offset-md-3">
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
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Active Users</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Area
                                    Activity</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tab-pane-territories mt-3">
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
                                        </div>
                                    </div>
                                    <div class="active-territories-user d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <div class="territories-user-img">
                                                <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt=""
                                                    class="img-fluid" />
                                            </div>
                                            <div class="ms-3">
                                                <p>Michael Wong</p>
                                                <p class="font-12 color-light">12/5/2023</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="{{ URL::to('assets/img/cross-icon.png') }}" alt=""
                                                class="img-fluid" />
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

                <div class="new-box-area box">
                    <!-- <div class="btn-group" role="group" aria-label="Basic example">
                                <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="user_pin_filter territory-filter filter nav-link active d-flex align-items-center justify-content-center "
                                        id="pills-filter-tab" data-toggle="pill" href="#pills-filter" role="tab">
                                        <img src="{{ URL::to('assets/img/btn-filter.png') }}" alt="" class="img-fluid" />
                                        <p class="ms-2">Filter</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="territory territory-filter nav-link d-flex align-items-center justify-content-center "
                                        id="pills-terr-tab" data-toggle="pill" href="#pills-terr" role="tab">
                                        <img src="{{ URL::to('assets/img/territories-img.png') }}" alt="" class="img-fluid" />
                                        <p class="ms-2">Territories</p>
                                    </a>
                                </li>
                                </ul>
                            </div> -->
                    <div class="tab-content bg-new-white bg-white" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-filter" role="tabpanel"
                            aria-labelledby="ills-filter-tab">
                            <form id="search_pin_form" method="get">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="filter_error_msg"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="font-600 color-0087 text-center font-20">Choose some filters</p>
                                        <!-- <p>Choose some filters <span style="cursor:pointer;" class="text-danger pull-right clear_filter">Clear filter</span></p> -->
                                        <div class="input-group mb-3 territories-input ">
                                            <input type="text" name="address" id="googleautocomplete"
                                                onfocus="GoogleAutoComplete()" class="form-control"
                                                placeholder="Search Projects">
                                            <input type="hidden" name="search_latitude" id="search_latitude"
                                                value="37.09024">
                                            <input type="hidden" name="search_longitude" id="search_longitude"
                                                value="-95.712891">
                                            <div class="search-icon">
                                                <span>
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group new-modal new-select">
                                            <label>Territory</label>
                                            <select name="territory[]" class="select2" placeholder="Territory" multiple>
                                                @if (!empty($getTerritories) && count($getTerritories))
                                                    @foreach ($getTerritories as $getTerritory)
                                                        <option value="{{ $getTerritory->id }}">{{ $getTerritory->title }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group new-modal new-input">
                                            <label>Status Modified Date</label>
                                            <input type="date" name="status_modified_date" class="form-control"
                                                placeholder="Date">
                                        </div>
                                        <div class="form-group new-modal">
                                            <label>Updated At</label>
                                            <input type="date" name="updated_at" class="form-control"
                                                placeholder="Updated At">
                                        </div>
                                        <div class="form_group">
                                            <label>Created At</label>
                                            <select name="date_filter" class="form-control date_filter form-control2">
                                                <option value="">Select Date Range</option>
                                                <option value="today">Today</option>
                                                <option value="yesterday">Yesterday</option>
                                                <option value="this_ween">This Week</option>
                                                <option value="last_week">Last Week</option>
                                                <option value="this_month">This Month</option>
                                                <option value="last_month">Last Month</option>
                                                <option value="this_year">This Year</option>
                                                <option value="last_year">Last Year</option>
                                                <option value="custom">custom</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="custom_date" style="display: none;">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>From Date</label>
                                            <input type="date" name="from_date" placeholder="From Date" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label>To Date</label>
                                        <div class="form-group">
                                            <input type="date" name="to_date" placeholder="To Date" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                @if (!empty($companyStatuses) && count($companyStatuses))
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <div class="form-group boder">
                                                <h5 class="font-weight-bold ">Status</h5>
                                            </div>
                                            <div class="form-check mb-3 mt-4">
                                                <input type="checkbox" name="select_all_status" value="1"
                                                    class="form-check-input" id="select_all_status">
                                                <label class="form-check-label" for="select_all_status"> Select All</label>
                                            </div>

                                            @foreach ($companyStatuses as $companyStatus)
                                                <div class="d-flex flex-row justify-content-between mb-3 ft-14">
                                                    <div class="first-cell">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="pin_status_id[]"
                                                                value="{{ $companyStatus->id }}" class="form-check-input"
                                                                id="exampleCheck{{ $companyStatus->id }}">
                                                            <label class="form-check-label color-gray"
                                                                for="exampleCheck{{ $companyStatus->id }}">{{ $companyStatus->title }}</label>
                                                        </div>
                                                    </div>
                                                    <div>1%</div>
                                                    <div>{{ $companyStatus->status_count }}
                                                        <span class="pl-1">
                                                            <img style="width:16px; height: 16px; object-fit: contain;"
                                                                src="{{ $companyStatus->image_url }}">
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group text-center mt-3">
                                    <button type="submit" class="filter-btn-without-icon bg-orange">Search</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-terr" role="tabpanel" aria-labelledby="pills-terr-tab">
                            <form id="add_territory_form" method="post">
                                <input type="hidden" name="geofence_detail" id="territory_latlng" value="">
                                <input type="hidden" name="center_point" id="add_center_point" value="">
                                <div class="row territory_form" style="display:none;">
                                    <div class="form-group col-md-12">
                                        <h5 class="font-weight-bold font-24 color-4e5164">Add Territory</h5>
                                        <hr />
                                    </div>
                                    <div class="d-flex form-group col-md-12 align-items-center">
                                        <div class="mr-auto font-18 font-semi-bold color-4e5164">Choose the color</div>
                                        <div class="colorComponent"> <input type="color" class="favcolor" id="favcolor"
                                                name="color" value="#ff0000" required></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="font-semi-bold color-4e5164">Name</label>
                                        <input type="text" name="title" id="territory_title" value=""
                                            class="form-control form-control2" required>
                                    </div>
                                    <!-- <div class="form-group col-md-12">
                                            <label>Universe</label>
                                            <input type="number" name="universe" id="universe" value="" class="form-control form-control2" required>
                                            </div> -->
                                    <div class="form-group col-md-12 new-select">
                                        <label class="font-semi-bold color-4e5164">Assign User</label>
                                        <select name="assignee_user_id[]" id="territory_user_id" multiple
                                            class="form-control form-control2 select2" required>
                                            @if (!empty($companyUsers) && count($companyUsers))
                                                @foreach ($companyUsers as $companyUser)
                                                    <option value="{{ $companyUser->id }}">{{ $companyUser->name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                    <div class="bnt-area mt-4  d-flex align-items-center justify-content-center">
                                        <div class="form-group ">
                                            <button type="submit" class="btn btn-save btn-block btn-theme">
                                                <ul class=" d-flex align-items-center justify-content-center">
                                                    <li class="me-2">+</li>
                                                    <li>Save </li>
                                                </ul>
                                            </button>
                                        </div>
                                        <div class="form-group ml-4 ms-4">
                                            <button type="button"
                                                class="btn cencel-btn btn-block territory-close btn-theme2">
                                                <ul class=" d-flex align-items-center justify-content-center">
                                                    <li class="me-2">-</li>
                                                    <li>Cancel</li>
                                                </ul>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="javascript:void(0)" id="_clear_territory"
                                        class="color-danger d-flex align-items-center justify-content-center mt-5 clear-filter">
                                        Clear Territory on Map
                                    </a>
                                </div>
                            </form>
                            <form id="update_territory_form" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="geofence_detail" id="edit_territory_latlng" value="">
                                <input type="hidden" name="territory_id" id="territory_id" value="">
                                <input type="hidden" name="center_point" id="edit_center_point" value="">
                                <div class="row edit_territory_form" style="display:none;">
                                    <div class="form-group col-md-12">
                                        <h5 class="font-weight-bold font-24">Edit Territory</h5>
                                        <hr />
                                    </div>
                                    <div class="d-flex form-group col-md-12 align-items-center">
                                        <div class="mr-auto font-18 font-semi-bold">Choose the color</div>
                                        <div class="colorComponent"> <input type="color" class="favcolor" id="favcolor"
                                                name="color" value="#ff0000" required></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Name</label>
                                        <input type="text" name="title" id="territory_title" value=""
                                            class="form-control form-control2" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Universe</label>
                                        <input type="number" name="universe" id="universe" value=""
                                            class="form-control form-control2" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Assign User</label>
                                        <select name="assignee_user_id[]" id="territory_user_id" multiple
                                            class="form-control form-control2 territory_user_id" required>
                                            @if (!empty($companyUsers) && count($companyUsers))
                                                @foreach ($companyUsers as $companyUser)
                                                    <option value="{{ $companyUser->id }}">{{ $companyUser->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-save btn-block btn-theme">Save</button>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="button"
                                            class="btn btn-close btn-block territory-close btn-theme2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <div class="territory_list">
                                <div class="input-group mb-2 territories-input">
                                    <input type="text" name="territories_search" id="aerritories_search" class=""
                                        placeholder="Search Territory Name">
                                    <div class="search-icon">
                                        <span><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between pt-4 territorE-border">
                                    <h5 class="font-weight-bold mb-0 color-3f3d56">
                                        Territories ({{ isset($territories->data) ? count($territories->data) : 0 }})
                                    </h5>


                                    <div class="add_territory"><span class="fa fa-plus color-3f3d56"></span></div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" checked name="select_all_territory" value="1"
                                            class="select_all_territory form-check-input">
                                        <label class="form-check-label">Select All Territories</label>
                                    </div>
                                </div>
                                @if (!empty($territories->data) && count($territories->data) > 0)
                                    @foreach ($territories->data as $territory)
                                        <div class="d-flex flex-row justify-content-between mb-3 ft-14">
                                            <div>
                                                <div class="form-check">
                                                    <input type="checkbox" checked name="territory_id[]"
                                                        value="{{ $territory->id }}" class="select_territory form-check-input">
                                                    <label class="form-check-label color-c840e9">{{ $territory->title }}</label>
                                                </div>
                                            </div>
                                            <div class="dropdown territory-edit-dropdown">
                                                <span class="fa fa-cog" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"></span>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item edit_territory"
                                                        data-record="{{ json_encode($territory) }}" href="javascript:void(0)">Edit
                                                        Territory</a>
                                                    <a class="dropdown-item move_territory"
                                                        data-record="{{ json_encode($territory) }}" href="javascript:void(0)">Move
                                                        Map To Territory</a>
                                                    <a class="dropdown-item delete_territory" id="{{ $territory->id }}"
                                                        href="javascript:void(0)">Delete Territory</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="form-group d-flex align-items-center justify-content-center text-center mt-3">
                                    <button type="button" id="territory_search_btn"
                                        class="filter-btn-without-icon bg-orange">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div id="drawer" class="right-sidebar d-none"></div>
    </div>
    @push('scripts')
        <script>
            var user_pin = `{!! !empty($user_pin) ? json_encode($user_pin) : '' !!}`;
            user_pin = user_pin.length > 0 ? JSON.parse(user_pin) : '';
        </script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
        <script defer
            src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places,drawing&callback=initMap"></script>
        <script src="{{ asset('assets/admin/js/map.js') }}"></script>
        <script>
            $("#pills-terr-tab").click(function () {
                $("#pills-terr").addClass("active show");
                $(".new-box-area").show();

                $("#pills-filter").removeClass("active show");
                $(this).addClass("bg-orange");
                $("#pills-filter-tab").addClass("bg-grey");
                $("#pills-filter-tab").removeClass("bg-orange");


            })
            $("#pills-filter-tab").click(function () {
                $("#pills-terr").removeClass("active show");
                $(".new-box-area").show();
                $("#pills-filter").addClass("active show");
                $(this).addClass("bg-orange");
                $("#pills-terr-tab").addClass("bg-grey");
                $("#pills-terr-tab").removeClass("bg-orange");


            })
        </script>
        <script src="{{ asset('assets/admin/js/autocomplete-address.js') }}"></script>
        <script>
            ajax_form_submitted('#pinDetailForm', '#pinDetailFormError', '#pinDetailFormSuccess')
            $('.phone').mask('(000) 000-0000');
            $('.id_0').datetimepicker({
                "allowInputToggle": true,
                "showClose": true,
                "showClear": true,
                "showTodayButton": true,
                "format": "MM/DD/YYYY hh:mm:ss A",
            });
        </script>
    @endpush
@endsection