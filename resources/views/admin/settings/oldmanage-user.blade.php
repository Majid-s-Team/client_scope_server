@extends('admin.master') 
@section('content')
 
        <!-- <div class="wrapper d-flex align-items-stretch">
           
            <div id="content" class="p-4">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="heading2 font-30 color-f58719">Manage Users</h5>
                    </div>
                    <div class="col-12">
                        <div class="table-header mt-5" style="padding: 25px 10px 25px 20px;">
                            <div>
                                <div class="chat-detail d-flex align-items-center">
                                    <div>
                                        <div class="other-chat-img">
                                            <img src="{{ get_user()->image_url }}" title="{{ get_user()->name }}" alt="{{ get_user()->name }}" />
                                        </div>
                                    </div>
                                    <div class="other-user-names ml-3 chat-time">
                                        <h2 class="font-18">{{ get_user()->name }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="input-group territories-input user-search">
                                    <input type="text" name="search" class="form-control manage-input autocomplete" placeholder="Find people and conversations" autocomplete="off" />
                                    <div class="search-icon manage-icon">
                                        <span>
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="manage-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-20">Profile</th>
                                        <th scope="col" class="w-20">Status</th>
                                        <th class="w-60"></th>
                                    </tr>
                                </thead>
                                <tbody id="manage_user">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <section class="content-area">
            <div class="account-details">
                <div class="row">
                    <div class="col-12">
                        <div class="map-header">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="{{ URL::to('assets/img/back-img.png') }}" alt="" class="img-fluid" />
                                </div>
                                <div>
                                    <p class="font-22 ms-3">User Management</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="input-group map-input">
                                    <input type="" name="" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="me-3">
                                    <button type="submit" class="map-filter-btn bg-orange">
                                    <ul class=" d-flex align-items-center justify-content-center">
                                        <li class="me-2"> <img src="{{ URL::to('assets/img/btn-filter.png') }}" alt="" class="img-fluid" /></li>
                                        <li>Filters</li>
                                    </ul>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="row mt-3">
                <div class="col-12">
                    <div class="table-responsive list-table user-manage-table" >
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                    
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    
                                    </th>
                                    <th scope="col">Username</th>
                                    <th scope="col" class="color-light">Designation</th>
                                    <th scope="col"><span class="table-circle circle-white me-2"></span > Status</th>
                                    <th scope="col"><img src="{{ URL::to('assets/img/table-last-icon.png') }}" alt="" class="img-fluid" /></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="table-user-img"><img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" /></div>
                                            <div><p class="ms-1">Justin Nelson</p></div>
                                        </div>
                                    </td>
                                   <td>Sales Team Lead - Territory 3</td>
                                    <td><span class="table-circle tabl-cicrle-green me-2"></span><span class="color-green">Active</span></td>
                                    <td><img src="{{ URL::to('assets/img/table-last-lighticon.png') }}" alt="" class="img-fluid" /></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <ul class="pagination table-pagination">
                        <li class="disabled left-arrow"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#" class="pagination-ordering" >1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#"  class="pagination-ordering" >2</a></li>
                        <li><a href="#" class="pagination-ordering" >3</a></li>
                        <li><a href="#" class="pagination-ordering" >4</a></li>
                        <li><a href="#" class="pagination-ordering" >5</a></li>
                        <li class="right-arrow"><a href="#">&raquo;</a></li>
                    </ul>
                </div>
        </div> 
            </div>
        </section>
        @push('scripts')
            <script src="{{ asset('assets/admin/js/manage-user.js') }}"></script>
        @endpush 
@endsection
</div>