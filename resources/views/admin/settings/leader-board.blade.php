@extends('admin.master') @section('content')
<section class="content-area">
<form id="leader_board_form">

            <div class="account-details">
                <div class="row">
                    <div class="col-12">
                        <div class="map-header">
                            <div class="d-flex align-items-center">
                                <div>
                                   <a href="{{ URL::previous() }}"> <img src="{{ URL::to('assets/img/back-img.png') }}" alt="" class="img-fluid" /></a>
                                </div>
                                <div>
                                    <h2 class="font-22 ms-3">Leaderboard</h2>
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
                    <div class="col-md-6"></div>
							<div class="form-group col-md-3">
								<label>Time Frame</label>
								<select
									name="time_frame"
									class="form-control time_frame lb-select-bg"
								>
									<option value="">Select Time Frame</option>
									<option value="today">Today</option>
									<option value="yesterday">Yesterday</option>
									<option value="this_week">This Week</option>
									<option value="last_week">Last Week</option>
									<option value="this_month">This Month</option>
									<option value="last_month">Last Month</option>
									<option value="this_year">This Year</option>
									<option value="last_year">Last Year</option>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label>Kpi Group</label>
								<select
									name="kpi_group_id"
									class="form-control kpi_group_id lb-select-bg"
								>
									<option value="">Select Kpi Group</option>
									@if( count($kpi_groups) ) @foreach( $kpi_groups as $kpi_group
									)
									<option value="{{ $kpi_group->id }}">
										{{ $kpi_group->title }}
									</option>
									@endforeach @endif
								</select>
							</div>
						</div>
                </div>   
                <div class="row mt-3">
                    <div class="col-12 col-md-9 leader">
                            <!-- <div class="table-responsive  list-table user-manage-table" >
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col" class="color-light"></th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Sales %</th>
                                        </tr>
                                    </thead>
                                    <tbody id="leader_board">
                                      
                                        
                                        

                                        
                                    </tbody>
                                </table>
                            </div> -->
                            <!-- <div class="col-12 mt-3">
                                <ul class="pagination table-pagination">
                                    <li class="disabled left-arrow"><a href="#">&laquo;</a></li>
                                    <li class="active"><a href="#" class="pagination-ordering" >1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#"  class="pagination-ordering" >2</a></li>
                                    <li><a href="#" class="pagination-ordering" >3</a></li>
                                    <li><a href="#" class="pagination-ordering" >4</a></li>
                                    <li><a href="#" class="pagination-ordering" >5</a></li>
                                    <li class="right-arrow"><a href="#">&raquo;</a></li>
                                </ul>
                            </div> -->
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="user-chat-detail d-none">
                            <div class="user-chat-profile text-center">
                                <div class="chat-profile-img mt-3">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid user_image" />
                                </div>
                                <p class="font-18 mt-3 user_name">Harry Bailey</p>
                                <p class="font-14 color-light mt-1 team_title">Lead Sales Agent - Territory 3</p>
                            </div>
                            <div class="user-chat-text">
                                <p class="font-16 mt-5">Contact Info</p>
                                <ul class="d-flex align-items-center mt-4">
                                    <li>
                                        <img src="{{ URL::to('assets/img/message-icon.png') }}" alt="" class="img-fluid" />
                                    </li>
                                    <li class="ms-2">
                                        <p class="color-light font-12">Email Address</p>
                                        <p class="font-12 user_email">iamharry.bai@email.com</p>
                                    </li>
                                </ul>
                                <ul class="d-flex align-items-center mt-3">
                                    <li>
                                        <img src="{{ URL::to('assets/img/phone-icon.png') }}" alt="" class="img-fluid" />
                                    </li>
                                    <li class="ms-2">
                                        <p class="color-light font-12">Phone Number</p>
                                        <p class="font-12 user_no">(435)892-2995</p>
                                    </li>
                                </ul>
                                <!-- <p class="font-18 mt-5">Professional Info</p>
                                <div class="mt-4">
                                    <p class="color-light font-12">Team</p>
                                    <p class="font-12 mt-1">Harry Parkinson’s Team</p>
                                </div>
                                <div class="mt-2">
                                    <p class="color-light font-12">Territory</p>
                                    <p class="font-12 mt-1">Territory 4 Phase 3</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
</form>
        </section>

@push('scripts')
<script src="{{ asset('assets/admin/js/leader-board.js') }}"></script>
<script>
    $(document).on("click","tr",function(){
        $(".user_image").attr("src",$(this).data('image_url'));
        $(".user_name").html($(this).data("name"));
        $(".user_no").html($(this).data("mobile_no"));
        $(".user_email").html($(this).data("email"));
        $(".team_title").html($(this).data("team_title"));
        console.log($(this).data("email"));
    });
   
  setTimeout(()=>{
       var tr=jQuery(".bg-first");
       if(tr.length>0){
        $(".user-chat-detail").removeClass('d-none');
        $(".user_image").attr("src",$(tr).data('image_url'));
        $(".user_name").html($(tr).data("name"));
        $(".user_no").html($(tr).data("mobile_no"));
        $(".user_email").html($(tr).data("email"));
        $(".team_title").html($(tr).data("team_title"));
       }
     
    },1000);
</script>
@endpush @endsection
