@extends('admin.master') @section('content') 
<!-- <div class="wrapper d-flex align-items-stretch">
	<div id="content" class="p-4">
		<h1 class="font-30 color-f58719 mb-4">Messages</h1>
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="chat-users">
					<div class="chat-profile">
						<ul>
							<li class="user-profile"> 
								<div class="user-chat-img">
									<img
										src="{{ URL::to(get_user()->image_url)  }}"
										alt="user-profile"
									/>
								</div>
								<img
										src="{{ asset('assets/images/online-icon.png') }}"
										alt="user-profile"
										class="ml-4 user-active-img"
									/>
							</li>
							<li class="user-name">
								<h2 class="font-30 color-black">
									{{ get_user()->name }}
									
								</h2>
								<p>{{ get_user()->email }}</p>
							</li>
						</ul>
					</div>
					<div class="input-group mb-3 territories-input">
						<input
							type="text"
							name="search"
							class="form-control autocomplete"
							placeholder="Find people and conversations"
						/>
						<div class="search-icon">
							<span>
								<i class="fa fa-search"></i>
							</span>
						</div>
					</div>
					<div class="tabs-area">
						<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
							<li class="nav-item" role="presentation">
								<a
									class="nav-link active"
									id="pills-recent-tab"
									data-toggle="pill"
									href="#pills-recent"
									role="tab"
									aria-controls="pills-recent"
									aria-selected="true"
									>Recent</a
								>
							</li>
							<li class="nav-item" role="presentation">
								<a
									class="nav-link"
									id="pills-groups-tab"
									data-toggle="pill"
									href="#pills-groups"
									role="tab"
									aria-controls="pills-groups"
									aria-selected="false"
									>Group
								</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div
								class="tab-pane fade show active"
								id="pills-recent"
								role="tabpanel"
								aria-labelledby="pills-recent-tab"
							>
								<div id="recent_chat" class="chat mt-5"></div>
							</div>
							<div
								class="tab-pane fade"
								id="pills-groups"
								role="tabpanel"
								aria-labelledby="pills-groups-tab"
							>
								<div id="recent_group"></div>
								<a data-toggle="modal" id="tooltip" data-placement="top" title="Create Chat Group" data-target="#addGroup" href="javascript:void(0)">
									<img
										src="{{ asset('assets/images/add-user.png') }}"
										alt="user-profile"
										class="ad-user"
									/>
								</a>								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-8">
				<div class="chat-screen">
					<div class="chat-detail chat-bottom-border d-flex align-items-center">
						<div class="active-chat-user" id="active_chat_user_name"></div>
						<div id="chat_room_title" style="margin-top: 10px;" class="other-user-names ml-3 chat-time">
							<p class="font-18">Chat Room</p>
						</div>
					</div>
					<div class="chatting-area">
						<div class="chat-box"></div>
					</div>
				</div>
				<div class="msg-input">
					<div class="postion-relative">
						<input type="text" class="chat_message" name="chat_message" placeholder="Write here…" />
						<div class="send-icon">
							<img
								class="send_message"
								src="{{ asset('assets/images/send.png') }}"
								alt="Send Message"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="row">
			<div class="col-md-4 mb-3">
				<div class="inbox">
					<div class="media mb-3">
						<img
							src="{{ URL::to(get_user()->image_url)  }}"
							class="mr-3 active-user"
							alt="{{ get_user()->name }}"
						/>
						<div class="media-body">
							<h5 class="mb-1 active-username">{{ get_user()->name }}</h5>
							<p class="ft-14">{{ get_user()->email }}</p>
						</div>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"
								><i class="fa fa-search" aria-hidden="true"></i
							></span>
						</div>
						<input
							type="search"
							name="search"
							class="form-control autocomplete"
							placeholder="Find people and conversation"
							autocomplete="off"
						/>
					</div>
					<ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
						<li class="nav-item" role="presentation">
							<a
								class="nav-link active"
								id="pills-recent-tab"
								data-toggle="pill"
								href="#pills-recent"
								role="tab"
								aria-controls="pills-recent"
								aria-selected="true"
								>Recent Chat</a
							>
						</li>
						<li class="nav-item" role="presentation">
							<a
								class="nav-link"
								id="pills-groups-tab"
								data-toggle="pill"
								href="#pills-groups"
								role="tab"
								aria-controls="pills-groups"
								aria-selected="false"
								>Group
								<i
									data-toggle="modal"
									id="tooltip"
									data-toggle="tooltip"
									data-placement="top"
									title="Add Group"
									data-target="#addGroup"
									class="fa fa-plus-circle pl-1"
								></i
							></a>
						</li>
					</ul>
					<div class="tab-content" id="pills-tabContent">
						<div
							class="tab-pane fade show active"
							id="pills-recent"
							role="tabpanel"
							aria-labelledby="pills-recent-tab"
						>
							<div id="recent_chat"></div>
						</div>
						<div
							class="tab-pane fade"
							id="pills-unread"
							role="tabpanel"
							aria-labelledby="pills-unread-tab"
						>
							...
						</div>
						<div
							class="tab-pane fade"
							id="pills-groups"
							role="tabpanel"
							aria-labelledby="pills-groups-tab"
						>
							<div id="recent_group"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 mb-3">
				<div class="chats">
					<div class="active-chat-user" id="active_chat_user_name">
						Chat Room
						<hr />
					</div>
					<div data-receiver="0" class="chat-box"></div>
					<div id="start_typing" class="row send-message"></div>
					<div class="message-box">
						<div class="input-group mb-3">
							<textarea
								maxlength="1000"
								max="1000"
								class="form-control chat_message"
								name="chat_message"
								placeholder="Message here"
								style="border: none; resize: none"
							></textarea>
							<input
								type="file"
								name="attachment"
								id="attachment"
								accept="image/*"
								style="display: none"
							/>
							<div class="input-group-append selectAttachment">
								<span class="input-group-text" style="border: none">
									<i class="fa fa-paperclip" aria-hidden="true"></i>
								</span>
							</div>
							<div class="input-group-append send_message">
								<span class="input-group-text" style="border: none"
									><i class="fa fa-paper-plane" aria-hidden="true"></i
								></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>
<div class="modal fade participat-modal" id="view_member_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Members</h5>
                  <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div id="group_member_body" class="modal-body"></div>
            </div>
         </div>
      </div> -->
	  <section class="content-area">
        <div class="row">
			<div class="col-12 col-md-3">
				<div class="user-chats-groups">
				<div class="territories-tabs">
                         <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Recent</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Groups</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="tab-pane-chat mt-3" id="recent_chat">
                                    
									<!-- <div class="user-chat-box d-flex align-items-center">
										<div class="chat-box-profile">
												<img src="{{ URL::to('assets/img/user-img.png') }}" alt="" class="img-fluid" />
										</div>
										<div>
											<div class="ms-2">
												<div class="d-flex align-items-center justify-content-between">
													<p class="font-16 font-600">Aaron Lucas</p>
													<p class="font-14 color-light">12:35 PM</p>
												</div>
												<p class="font-14 color-light mt-2">Hi Paul. I am glad to get with you on this project.</p>
											</div>
										</div>
                                    </div> -->
									
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="tab-pane-territories mt-3" id="recent_group">
                                    <!-- <div class="active-territories-user d-flex align-items-center justify-content-between">
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
                                    </div> -->
                                    <!-- <div class="active-territories-user d-flex align-items-center justify-content-between">
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
                                    </div> -->
                                   
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="chat-area">
					<div class="chat-area-header" id="chat_room_title">
						<p class="font-18">Harry Bailey </p>
						<!-- <p class="font-14 color-light">Lead Sales Agent - Territory 3</p> -->
					</div>
					<div class="chat-box-content">
						<div class="row chat-box" id="chat-box">
							<!-- <div class="col-12 ">
								<p class="text-center color-light font-12 mt-5 mb-3">Sunday, 05 Nov, 2023</p>
							</div>
							<div class="col-12 col-md-6 col-lg-8">
								<div class="other-user-chat">
									<p class="color-light font-12">Yesterday, 8:19 PM</p>
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							<div class="col-12 ">
								<p class="text-center color-light font-12 mt-5 mb-3">Sunday, 05 Nov, 2023</p>
							</div>
							<div class="col-12 col-md-6 col-lg-8 offset-md-6 offset-lg-4">
								<div class="mychat" >
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div> -->
							
							
						</div>
					</div>
					<div class="chat-area-footer">
						<div class="sent-text-box">
							<input type="text" class="chat_message" name="chat_message" placeholder="Type your message here">
							<div class="sent-chat-img">
								<img class="send_message" src="{{ URL::to('assets/img/sent-icon.png') }}" alt="" class="img-fluid" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3 chat-detail d-none">
					<div class="user-chat-detail">
                            <div class="user-chat-profile text-center">
                                <div class="chat-profile-img mt-3">
                                    <img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid chat_profile_image" />
                                </div>
                                <p class="font-18 mt-3 chat_profile_name"></p>
                                <p class="font-14 color-light mt-1"></p>
                            </div>
                            <div class="user-chat-text">
                                <p class="font-16 mt-5">Contact Info</p>
                                <ul class="d-flex align-items-center mt-4">
                                    <li>
                                        <img src="{{ URL::to('assets/img/message-icon.png') }}" alt="" class="img-fluid" />
                                    </li>
                                    <li class="ms-2">
                                        <p class="color-light font-12">Email Address</p>
                                        <p class="font-12 email_address"></p>
                                    </li>
                                </ul>
                                <ul class="d-flex align-items-center mt-3">
                                    <li>
                                        <img src="{{ URL::to('assets/img/phone-icon.png') }}" alt="" class="img-fluid" />
                                    </li>
                                    <li class="ms-2">
                                        <p class="color-light font-12">Phone Number</p>
                                        <p class="font-12 phone_number"></p>
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
        
    </section>
@include('admin.modal.add-group',['users' => $users]) @push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="{{ asset('assets/admin/js/chat.js') }}"></script>
<script>
	$('#tooltip').tooltip()
</script>
<script>
    // JavaScript to show and hide the modal
    function showModal() {
      document.getElementById('overlay').style.display = 'block';
      document.getElementById('modal').style.display = 'block';
    }

    function hideModal() {
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('modal').style.display = 'none';
    }
  </script>
@endpush @endsection
