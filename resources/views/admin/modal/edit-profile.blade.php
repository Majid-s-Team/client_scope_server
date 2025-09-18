<div class="modal fade new-modal" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog add-modal edit-profile-img" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="btn close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="edit_profile_form" method="POST" enctype="multipart/form-data" action="{{ route('admin.update-profile') }}">
            <div class="modal-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <div id="edit_profile_error" class="error_div"></div>
                        <div id="edit_profile_success" class="success_div"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image_url" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload">
                                    <img id="imagePreview" src="{{ asset('assets/images/upload-img.png')}}" alt="" class="static-img">
                                </label>
                            </div>
                            <div class="avatar-preview">
                                <img id="imagePreview" src="{{ !empty(get_user()->image_url) ? URL::to(get_user()->image_url) : URL::to('images/user-placeholder.png') }}" alt="" class="static-img">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ get_user()->name }}" class="form-control" placeholder="Name" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Phone</label>
                        <input type="text" name="mobile_no" value="{{ get_user()->mobile_no }}" class="form-control phone" placeholder="Mobile No" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" disabled name="email" value="{{ get_user()->email }}" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-12" >
                        <label>Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value=""> Select Gender </option>
                            <option value="male" {{ get_user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ get_user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="button" class="filter-btn-without-icon bg-orange" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="filter-btn-without-icon bg-btn-blue">
                        Save 
                    </button>
            
            </div>
        </form>    
    </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function(){
            ajax_form_submitted('#edit_profile_form','#edit_profile_error','#edit_profile_success')        
        })
    </script>
@endpush