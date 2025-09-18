@extends('admin.master')
@section('content')
@include('admin.include.navbar')
<style>
  table{
    width: 2400px !important;
    margin-left: 0px;
  }  
  table thead tr{
    background-color: #f58719 !important;

  }
  table thead tr th{
    color: #fff !important;
    width: 150px !important;
    padding: 10px 10px !important;
  }
  table thead tr td{
    width: 150px !important;
   
  } 
  .dataTables_scroll table thead tr th{
    padding-top: 15px !important;
    padding-bottom: 0px !important;
  }
  .dataTables_scroll table tbody tr td{
    padding: 15px 10px !important;
  }
</style>
<div class="wrapper d-flex align-items-stretch">
    @include('admin.include.sidebar')
    <div id="content" class="p-4">
        <div class="row ">
            <div class="col-12 col-md-6">
                <h1 class="list-title">List</h1> 
            </div>
            <div class="col-md-6 position-relative text-end">
                <div class="dropdown position-absolute">
                    <span class="dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa fa-cog"></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right setting-col">
                        @foreach( config('constants.PIN_GRID_COLUMN') as $value )
                        <span class="dropdown-item ft-14">
                            <label for="address">
                                <input type="checkbox" {{ $loop->index > 7 ? '' : 'checked' }}
                                    data-order="{{ $loop->index }}" id="{{ str_slug($value,'_') }}"
                                    name="{{ str_slug($value,'_') }}" class="pin_column">
                                {{ $value }}
                            </label>
                        </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 col-lg-4 col-xl-3 col-xxl-2">
                <form id="search_filter">
                    <div class="filter-box">
                        <p class="font-600 color-0087  filter-title">Filters</p>
                        <p class="font-600 color-0087  font-18">Choose some filters</p>
                        <div class="input-group  territories-input ">
                            <input type="text" name="keyword" id="" class="form-control filter_keyword" placeholder="Search Projects">
                            <div class="search-icon">
                                <span>
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                        <div class="status-text boder ">
                            <h5 class="font-weight-bold color-3f3d56 status-title">Status</h5>
                        </div>
                        <div class="mt-4">
                            @if( count($companyStatuses) )
                                @foreach ( $companyStatuses as $companyStatus )
                                <div class="d-flex flex-row justify-content-between mb-3 ft-14 status-detail">
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
                                <button type="submit" id="search_filter_btn" class="btn btn-save">Search</button>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
            <div class="col-12 col-md-12 col-lg-12 col-xl-9 col-xxl-10">
                <table id="userpins-list" class="table" style="width:100%;">
                    <thead>
                        <tr>
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
</div>
@push('scripts')
<script>
    var tableSorting = [16, 'desc'];
    var userPinListURL = '{{ route("admin.userpins.list") }}';
</script>
<script src="{{ asset('assets/admin/js/user-pin.js') }}"></script>
@endpush
@endsection