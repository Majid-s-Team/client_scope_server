@extends('admin.master') @section('content') 
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
                                <div class="tab-pane-chat mt-3">
                                    <div class="user-chat-box active-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
                                    </div>
									<div class="user-chat-box d-flex align-items-center">
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
			</div>
			<div class="col-12 col-md-6">
				<div class="chat-area">
					<div class="chat-area-header">
						<p class="font-18">Harry Bailey </p>
						<p class="font-14 color-light">Lead Sales Agent - Territory 3</p>
					</div>
					<div class="chat-box-content">
						<div class="row">
							<div class="col-12 ">
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
							</div>
							<div class="col-12 ">
								<p class="text-center color-light font-12 mt-5 mb-3">Sunday, 05 Nov, 2023</p>
							</div>
							<div class="col-12 col-md-6 col-lg-8">
								<div class="other-user-chat">
									<p class="color-light font-12">Yesterday, 8:19 PM</p>
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							
							<div class="col-12 col-md-6 col-lg-8 offset-md-6 offset-lg-4">
								<div class="mychat" >
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							
							<div class="col-12 col-md-6 col-lg-8">
								<div class="other-user-chat">
									<p class="color-light font-12">Yesterday, 8:19 PM</p>
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							
							<div class="col-12 col-md-6 col-lg-8 offset-md-6 offset-lg-4">
								<div class="mychat" >
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							
							<div class="col-12 col-md-6 col-lg-8">
								<div class="other-user-chat">
									<p class="color-light font-12">Yesterday, 8:19 PM</p>
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
							
							<div class="col-12 col-md-6 col-lg-8 offset-md-6 offset-lg-4">
								<div class="mychat" >
									<span class="chat-content">I thought this would be an awesome way to interact with the interface.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="chat-area-footer">
						<div class="sent-text-box">
							<input type="text" placeholder="Type your message here">
							<div class="sent-chat-img">
								<img src="{{ URL::to('assets/img/sent-icon.png') }}" alt="" class="img-fluid" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-3">
				<div class="user-chat-detail">
					<div class="user-chat-profile text-center">
						<div class="chat-profile-img mt-3">
							<img src="{{ URL::to('assets/img/territories-user-img.png') }}" alt="" class="img-fluid" />
						</div>
						<p class="font-18 mt-3">Harry Bailey</p>
						<p class="font-16 color-light mt-1">Lead Sales Agent - Territory 3</p>
					</div>
					<div class="user-chat-text">
						<p class="font-22 mt-5">Contact Info</p>
						<ul class="d-flex align-items-center mt-4">
							<li>
								<img src="{{ URL::to('assets/img/message-icon.png') }}" alt="" class="img-fluid" />
							</li>
							<li class="ms-2">
								<p class="color-light font-12">Email Address</p>
								<p class="font-12">iamharry.bai@email.com</p>
							</li>
						</ul>
						<ul class="d-flex align-items-center mt-3">
							<li>
								<img src="{{ URL::to('assets/img/phone-icon.png') }}" alt="" class="img-fluid" />
							</li>
							<li class="ms-2">
								<p class="color-light font-12">Phone Number</p>
								<p class="font-12">(435)892-2995</p>
							</li>
						</ul>
						<p class="font-22 mt-5">Professional Info</p>
						<div class="mt-4">
							<p class="color-light font-12">Team</p>
							<p class="font-12 mt-1">Harry Parkinson’s Team</p>
						</div>
						<div class="mt-2">
							<p class="color-light font-12">Territory</p>
							<p class="font-12 mt-1">Territory 4 Phase 3</p>
						</div>
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
