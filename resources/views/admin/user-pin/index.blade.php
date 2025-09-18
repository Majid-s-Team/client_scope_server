@extends('admin.master')
@push('stylesheets')
<style>

/* Ensure the DataTables wrapper takes full width and allows scrolling */
    .dataTables_wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    /* Force the table to be as wide as its content needs */
    table.dataTable {
        width: auto !important;
        min-width: 100% !important;
        margin: 0 !important;
        border-collapse: collapse;
    }
    
    /* Make sure table cells don't wrap and stay in one line */
    #userpins-list th, #userpins-list td {
        /*white-space: nowrap;*/
        padding: 8px 12px !important;
    }
    
    /* Optional: Add a fixed first column if needed */
     #userpins-list th:first-child, #userpins-list td:first-child {
        position: sticky;
        left: 0;
        background: white;
        z-index: 10;
    } 
    
    /* Style for the table container */
    .list-table {
        overflow-x: auto;
        width: 100%;
        display: block;
    }
    
    /* Other existing styles */
    .table>:not(:last-child)>:last-child>* {
    }
    .dataTables_scroll table thead tr th {
        padding-top: 15px !important;
        padding-bottom: 15px !important;
    }
    table thead tr th:nth-child(1) {
        width: 13px !important;
    }
    .dropdown.filter-dropdown {
        position: absolute;
        transform: translate(-39px, -71px);
        right: 0;
        z-index: 999;
    }
    .dropdown-menu.dropdown-menu-right.setting-col.show {
        transform: translate3d(-104px, 20px, 0px) !important;
    }
    div#wrapper main {
        background-color: #f7f7fa;
        height: auto;
        overflow-x: auto;
    }

</style>
@endpush
@section('content')
    <section class="content-area">
        <div class="row">
            <div class="col-12">
                <div class="map-header">
                    <div>
                        <h2 class="font-22">Leads Listings</h2>
                    </div>
                    <form id="search_filter" class="position-relative lead-box">
                        <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="input-group map-input territories-input">
                                        <input type="text" name="keyword" id="" class="form-control filter_keyword" placeholder="Search Projects">
                                    </div>
                                </div>
                                <div class="me-3">
                                    
                                    <button type="button" class="map-filter-btn bg-orange" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <ul class=" d-flex align-items-center justify-content-center">
                                            <li class="me-2"> <img src="{{ URL::to('assets/img/btn-filter.png') }}" alt="" class="img-fluid" /></li>
                                            <li>Filters</li>
                                        </ul>
                                    </button>
                                </div>
                                <!-- <div class="me-3">
                                    <button type="submit" class="map-filter-btn bg-grey">
                                        <ul class=" d-flex align-items-center justify-content-center">
                                            <li class="me-2"> <img src="{{ URL::to('assets/img/add-new-icon.png') }}" alt="" class="img-fluid" /></li>
                                            <li>Add New</li>
                                        </ul>
                                    </button>
                                </div> -->
                        </div>
                        <!-- <div class="me-3">
                            <button type="submit" class="map-filter-btn bg-grey">
                              <ul class=" d-flex align-items-center justify-content-center">
                                 <li class="me-2"> <img src="{{ URL::to('assets/img/territories-img.png') }}" alt="" class="img-fluid" /></li>
                                 <li>Add New</li>
                              </ul>
                           </button>
                        </div> -->
                       <div class="form-position">
                            <div class="status-text boder collapse "   id="collapseExample">
                                <h5 class="font-weight-bold status-title">Status</h5>
                            </div>
                            <div class="mt-2 collapse" id="collapseExample">
                        @if(!empty($companyStatuses) && count($companyStatuses))
                            @foreach ($companyStatuses as $companyStatus)
                                    <div class="d-flex flex-row justify-content-between ft-14 status-detail">
                                        <div class="first-cell">
                                            <div class="form-check">
                                                <input type="checkbox" name="pin_status_id[]" value="{{ $companyStatus->id }}" class="form-check-input filter_status" id="filter_status_{{ $companyStatus->id }}">
                                                <label class="form-check-label color-gray" for="filter_status_{{ $companyStatus->id }}">{{ $companyStatus->title }}</label>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-1">
                                                <span>{{ $companyStatus->status_count }}</span>
                                                <img style="width:16px; height: 16px; object-fit: contain;" src="{{ $companyStatus->image_url }}">
                                            </span>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                <div class="form-group text-center mt-3">
                                    <button type="submit" id="search_filter_btn" class="btn btn-save mb-2">Search</button>
                                </div>
                            </div>
                       </div>
                </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12">
                <div class="dropdown filter-dropdown">
                    <span class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </span>
@php
    use Illuminate\Support\Str;
@endphp

<div class="dropdown-menu dropdown-menu-right setting-col">
    @foreach(config('constants.PIN_GRID_COLUMN') as $value)
        <span class="dropdown-item ft-14">
            <label for="{{ Str::slug($value, '_') }}">
                <input type="checkbox" {{ $loop->index > 7 ? '' : 'checked' }}
                    data-order="{{ $loop->index }}"
                    id="{{ Str::slug($value, '_') }}"
                    name="{{ Str::slug($value, '_') }}"
                    class="pin_column">
                {{ $value }}
            </label>
        </span>
    @endforeach
</div>

                </div>
                
                <!-- Modified table container -->
                <div class="list-table">
                    <table class="table table-bordered" id="userpins-list">
                        <thead>
                            <tr> 
                                <th scope="col">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                </th>
                                <th scope="col" class="w-14">Address</th>
                                <th scope="col" class="w-14">Created By</th>
                                <th scope="col" class="w-14">Assigned To</th>
                                <th scope="col" class="w-14">Status</th>
                                <th scope="col" class="w-14">Territory</th>
                                <th scope="col" class="w-14">Updated By</th>
                                <th scope="col" class="w-14">House Number</th>
                                <th scope="col" class="w-14">Unit</th>
                                <th scope="col" class="w-14">State</th>
                                <th scope="col" class="w-14">City</th>
                                <th scope="col" class="w-14">Zip code</th>
                                <th scope="col" class="w-14">Latitude</th>
                                <th scope="col" class="w-14">Longitude</th>
                                <th scope="col" class="w-14">Name</th>
                                <th scope="col" class="w-14">Phone</th>
                                <th scope="col" class="w-14">Email</th>
                                <th scope="col" class="w-14">Created Date</th>
                                <th scope="col" class="w-14">Updated Date</th>
                                <th scope="col" class="w-14">Appointment Title</th>
                                <th scope="col" class="w-14">Notes</th>
                                <th scope="col" class="w-14">Last Status Modified Date</th>
                                <th scope="col" class="w-14">Number Of Status Changes</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
<script>
    var tableSorting = [10, 'desc'];
    var userPinListURL = '{{ route("admin.userpins.list") }}';
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown();
        
    });
</script>
<script src="{{ asset('assets/admin/js/user-pin.js') }}"></script>

@endpush
@endsection
