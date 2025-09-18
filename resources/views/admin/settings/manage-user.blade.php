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
                                <div onclick="window.history.back()">
                                  
                                        <img src="{{ URL::to('assets/img/back-img.png') }}" alt="" class="img-fluid" />
                                  
                                </div>
                                <div>
                                    <h2 class="font-22 ms-3">User Management</h2>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="input-group map-input">
                                    <input type="text" value="" name="" placeholder="Search..." class="search_user">
                                    </div>
                                </div>
                                <!-- <div class="me-3">
                                    <button type="submit" class="map-filter-btn bg-orange">
                                    <ul class=" d-flex align-items-center justify-content-center">
                                        <li class="me-2"> <img src="{{ URL::to('assets/img/btn-filter.png') }}" alt="" class="img-fluid" /></li>
                                        <li>Filters</li>
                                    </ul>
                                </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <div class="row mt-3 manage_user">
                
               </div> 
            </div>
        </section>
        @push('scripts')
            <script src="{{ asset('assets/admin/js/manage-user.js') }}"></script>
        @endpush 
@endsection
</div>