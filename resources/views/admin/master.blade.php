<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png" sizes="16x16" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link  rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
			integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
         />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css" />
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.1/socket.io.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.20.0/firebase-messaging.js"></script>
        @stack('stylesheets')
        <title>Client Scope</title>
        <script>
            
            var base_url = "{{ URL::to("/") }}";
            var current_url = "{{ Request::url() }}";
            var currentUser = JSON.parse(`{!! get_user() !!}`);
            var node_chat_url = '{{ env("NODE_CHAT_URL") }}';
            var table;
        </script>
        <style>
            .menu_active {
                color: #f5891e !important;
            }
          .add-modal  span.select2-container {
            z-index: 9999 !important;
            }
            .select2-dropdown {
            z-index: 9999 !important;
            }
        </style>
    </head>
    <body>
        <div id="ajaxLoader">
            <img src="{{ asset('images/ajax-loader.gif') }}" />
        </div>
        <div id="overlay"></div>
        <div class="d-flex toggled" id="wrapper">
            <aside class="flex-shrink-0" id="sidebar">
                <header class="sidebar-heading">
                    <div class="side-logo">
                    <a class="font-16" href="{{ route('admin.dashboard') }}">  <img src="{{ URL::to('assets/img/side-logo.png') }}" alt="" /></a>
                    </div>
                </header>
                <nav>
                    <ul class="nav flex-column mt-5">

                        <li class="nav-item  non-active text-center  {{ Request::url() == route('admin.dashboard')  ? 'side-active nav-active' : '' }}" >
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ asset('assets/img/dash-active.png')}}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/dashboard.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a class="font-16" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </div>
                            </div>
                        </li>
                    @if( get_user()->UserRole->slug != 'super-admin' )
                        <li class="nav-item  non-active {{ (strpos(\URL::current(), 'territory'))  ? 'side-active nav-active' : '' }}"> 
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/map-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/map.png') }}" class="img-fluid" alt="" />
                                    <!-- <img src="{{ URL::to('assets/img/map.png') }}" class="img-fluid" alt="" /> -->
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.map') }}" class="font-16" href="{{ route('admin.map')  }}">Maps</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item non-active {{ (strpos(\URL::current(), 'user-pin'))  ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/list-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/list.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.user-pin') }}" class="font-16" href="{{ route('admin.user-pin') }}">Lists </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'], 'calendar'))  ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/calender-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/calender.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.calender') }}" class="font-16" href="{{ route('admin.calender') }}">Calendar</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'],'chat'))  ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/message-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/message.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="message-count">
                                    <div> <a data-name="{{ route('admin.chat') }}" class="font-16" href="{{ route('admin.chat') }}">Messages</a></div>
                                    <div><p class="my-count">12</p></div>
                                </div>
                            </div>
                        </li>
                    @endif
                    @if( !empty(get_user()->user_meta['is_administrator']) || get_user()->UserRole->slug == 'company' )
                        <li class="nav-item non-active {{ Request::url() == route('admin.company-sales')  ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/sale-plan-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/sale-plan.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.company-sales') }}" class="font-16" href="{{ route('admin.company-sales') }}">Sales Plan</a>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if( !empty(get_user()->user_meta['is_administrator']) || get_user()->UserRole->slug == 'company' )

                        <li class="nav-item non-active {{ Request::url() == route('admin.account-details')  ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/setting-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/setting.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.account-details') }}" href="{{ route('admin.account-details') }}" class="font-16">Settings</a>
                                </div>
                            </div>
                        </li>
                        @endif
		   @if( !empty(get_user()->user_meta['is_administrator']) || get_user()->UserRole->slug == 'team-lead' || get_user()->UserRole->slug == 'company' )
                        <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'],'user-track')) ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/user-track-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/user-track.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.user-track') }}" class="font-16" href="{{ route('admin.user-track') }}">User Track </a>
                                </div>
                            </div>
                        </li>
           
		   @endif
           @if( !empty(get_user()->user_meta['is_administrator']) || get_user()->UserRole->slug == 'team-lead' || get_user()->UserRole->slug == 'company' )
                        <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'],'admin.statuses')) ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ asset('assets/images/location-icon-active.png')}}" alt="">
                                    <img class="non-active-icon static-img" src="{{ asset('assets/img/location-icon.png')}}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.statuses') }}" class="font-16" href="{{ route('admin.statuses') }}">Statuses </a>
                                </div>
                            </div>
                        </li>
           
		   @endif
                @if( get_user()->UserRole->slug == 'company' )
                    <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'],'admin.team')) ? 'side-active nav-active' : '' }}">
                    <div class="d-flex align-items-center">
                    <div class="me-3">

                        <img class="non-active-icon static-img" src="{{ asset('assets/images/team-management.png')}}" alt="">
                        <img class="active-icon active-img" src="{{ asset('assets/images/team-management-active.png')}}" alt="">
                        </div>
                                <div class="">
                                    <a data-name="{{ route('admin.team') }}" class="font-16" href="{{ route('admin.team') }}">Team Management </a>
                                </div>
                                </div>
                    
                    </li>	
                @endif  
          

                        <li class="nav-item non-active {{ (strpos($_SERVER['REQUEST_URI'],'leader-board')) ? 'side-active nav-active' : '' }}">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <img class="active-icon active-img" src="{{ URL::to('assets/img/leaderboard-active.png') }}" alt="">
                                    <img class="non-active-icon static-img" src="{{ URL::to('assets/img/leaderboard.png') }}" class="img-fluid" alt="" />
                                </div>
                                <div class="">
                                    <a data-name="{{ route('admin.leader-board') }}" href="{{ route('admin.leader-board') }}" class="font-16">Leaderboard</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="user-list d-flex align-items-center">
                        <li>
                            <div class="user-profile">
                                <img src="{{ URL::to('/') }}/assets/img/user-img.png" alt="" />
                            </div>
                        </li>
                        <li>
                            <p class="font-16">Paul Harrison</p>
                            <p class="color-light">Super Admin</p>
                        </li>
                    </ul>
                </nav>
            </aside>
            <main class="dashboard flex-grow-1">
               <header class="navbar navbar-expand-lg navbar-light">
                  <div class="container-fluid">
                        <div
                           class="d-flex align-items-center justify-content-between w-100 position-relative"
                        >
                           <div class="d-flex align-items-center">
                              <button class="btn ham-btn toggle-btn" id="menu-toggle">
                                 <i class="fa-solid fa-bars"></i>
                              </button>
                              <h3>Dashboard</h2>
                           </div>
                           <div>
                              <ul class="d-flex align-items-center">
                                    <!-- <li class="search-header-icon">
                                        <img src="{{ URL::to('assets/img/search-normal.png') }}" alt="" />
                                    </li> -->
                                    <li>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img src="{{ URL::to('assets/img/add-circle.png') }}" alt="" />
                                            </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        @if( get_user()->UserRole->slug != 'super-admin' )
                @if( !empty(get_user()->UserRole->slug) )
                    @if( get_user()->UserRole->slug == 'company' || !empty(get_user()->user_meta['is_administrator']) || !empty(get_user()->user_meta['manage_user']) )
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <div> <img src="{{ URL::to('assets/img/add-user-icon.png') }}" alt="" /></div>
                                                    <div><a class="nav-link _add_user" href="{{ route('admin.add-user') }}" data-target="#addUser"><p>Add User</p></a></div>
                                                </div>
                                            </li>
                                            @endif

                                            <li>

                                                <div class="d-flex align-items-center">
                                                    <div> <img src="{{ URL::to('assets/img/add-pin-icon.png') }}" alt="" /></div>
                                                    <div> <a class="nav-link _add_pin" href="{{ route('admin.add-pin') }}"  data-target="#addPin"><p>Add Pin</p></a></div>
                                                </div>
                                            </li>
                                            </ul>
                                        </div>
                                      
                                    </li>
                                    <!-- <li>
                                       <img src="{{ URL::to('assets/img/notification.png') }}" alt="" />
                                    </li> -->
                                    <li class="noti-drop nav-item dropdown ">
                                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                            <img src="{{ URL::to('assets/img/notification.png') }}" alt="" />
                                        </a>
                                        <div style="max-height:415px; overflow-y:scroll;" class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="notificationDropdown">
                                            <div id="notification_list"></div>
                                            <div id="notification_pagination"></div>
                                        </div>
                                    </li>
                                    @endif
                                    @endif
                                    <li>
                                    <div class="dropdown user-profile-dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                <div class="user-profile">
                                                <img src="{{ !empty(get_user()->image_url) ? URL::to(get_user()->image_url) : URL::to('images/user-placeholder.png') }}" alt="{{ get_user()->name }}">

                                                </div>
                                            </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#editProfile">View or edit profile</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#changePassword">Change Password</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                                            </li>
                                            </ul>
                                        </div>
                                     
                                    </li>
                              </ul>
                           </div>
                        </div>
                  </div>
               </header>
               @yield('content')
            </main>   
        </div>
        @include('admin.modal.change-password') @include('admin.modal.edit-profile')
        <div class="_ajax_modal" id="add_user_modal"></div>
        <div class="_ajax_modal" id="edit_user_modal"></div>
        <div class="_ajax_modal" id="add_pin_modal"></div>
        <div class="_ajax_modal" id="update_pin_modal"></div>
        <div class="_ajax_modal" id="add_appointment_modal"></div>
        <div class="_ajax_modal" id="add_status_modal"></div>
        <div class="_ajax_modal" id="edit_appointment_modal"></div>
        <div class="_ajax_modal" id="edit_status_modal"></div>
        <div class="_ajax_modal" id="edit_team_modal"></div>
        <div style="display: none;">
            <audio id="_notification_sound">
                <source src="{{ URL::to('notification.mp3') }}" />
            </audio>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>
        <script src="{{ base_url('/assets/admin/js/function.js') }}"></script>
        <script src="{{ base_url('/assets/admin/js/datatable-ajax.js') }}"></script>
        <script src="{{ base_url('/assets/admin/js/custom.js') }}"></script> 
        <script src="{{ asset('assets/admin/js/cloud-message.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap-datetimepicker.min.js') }}"></script>
            
        @stack('scripts')
        <script>
			$(document).ready(function () {
				var width = $(window).width()
				$(window).resize(function (e) {
					e.preventDefault()
					width = $(window).width()
					if (width <= 767) {
						// Compare with a number
						$('#wrapper').removeClass('toggled')
					}
				})
				$('#menu-toggle').click(function (e) {
					e.preventDefault()
					$('#wrapper').toggleClass('toggled')
				})
            $("#sidebar")
                .find("a[data-name]")
                .each(function () {
                    var link = $(this).attr("data-name");
                    var current_url = window.location.href;
                    if (current_url == link) {
                        // $(".active-icon").addClass("d-none");
                        $(this).find(".non-active-icon").addClass("d-none");
                        $(this).find(".active-icon").removeClass("d-none");
                        $(this).find(".active-icon").addClass("d-block");
                        
                        // $(this).parent().addClass("side-active");
                        return;
                    }
                });
			})
		</script>
    </body>
</html>
