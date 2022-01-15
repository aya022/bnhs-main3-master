@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;">
                    @if (!empty(auth()->user()->profile_image))
                    <img class="img-fluid rounded-circle shadow" src="{{ asset('image/profile/'.auth()->user()->profile_image) }}" alt="avatar" style="height: 100px; width: 100px;"> 
                    @else
                    <img alt="image" src="{{ asset('image/avatar-1.png') }}" class="avatar-img rounded-circle" style="height: 100px; width: 100px;">
                    @endif
                    &nbsp;&nbsp;My Profile
                </p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="card mb-5">
                        <div class="card-body">
                            <h5 class="card-title">Information</h5><hr>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><b>LRN</b></span>
                                <input type="text" class="form-control" placeholder="Username" value="{{ auth()->user()->roll_no }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                <span class="input-group-text" id="basic-addon1"><b>Status</b></span>
                                <input type="text" class="form-control text-success" placeholder="Username" value="Active" aria-label="Username" aria-describedby="basic-addon1" readonly>
                            </div>
                            <form id="studentForm">@csrf
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                    <div class="row">
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">First name</label>
                                            <input type="text" class="form-control" name="student_firstname"
                                                value="{{ auth()->user()->student_firstname }}" readonly  >
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Middle name</label>
                                            <input type="text" class="form-control" name="student_middlename"
                                                value="{{ auth()->user()->student_middlename }}" readonly >
                                        </div>
                                        <div class=" form-group col-lg-4 mb-3">
                                            <label class="mb-2">Last name</label>
                                            <input type="text" class="form-control" name="student_lastname"
                                                value="{{ auth()->user()->student_lastname }}" readonly  >
                                        </div>
                                    </div>
        
        
                                    <div class="row">
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Date of Birth</label>
                                            <input type="date" class="form-control" placeholder="DD/MM/YYYY"
                                                name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" readonly >
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Gender</label>
                                            <input type="text" class="form-control" name="gender"
                                                value="{{ auth()->user()->gender }}" readonly >
                                        </div>
        
        
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="student_contact"
                                                onkeypress="return numberOnly(event)"
                                                value="{{ auth()->user()->student_contact }}" readonly>
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="form-group col-lg-3 mb-3">
                                            <label class="mb-2">Region</label>
                                            <input type="text" class="form-control" name="region"
                                                value="{{ auth()->user()->region }}" readonly  >
                                        </div>
                                        <div class="form-group col-lg-3 mb-3">
                                            <label class="mb-2">Province</label>
                                            <input type="text" class="form-control" name="province"
                                                value="{{ auth()->user()->province }}" readonly >
                                        </div>
                                        <div class=" form-group col-lg-3 mb-3">
                                            <label class="mb-2">City</label>
                                            <input type="text" class="form-control" name="city"
                                                value="{{ auth()->user()->city }}" readonly  >
                                        </div>
                                        <div class=" form-group col-lg-3 mb-3">
                                            <label class="mb-2">Barangay</label>
                                            <input type="text" class="form-control" name="barangay"
                                                value="{{ auth()->user()->barangay }}" readonly  >
                                        </div>
                                    </div>
        
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Mother's name</label>
                                            <input type="text" class="form-control" name="mother_name"
                                                value="{{ auth()->user()->mother_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="mother_contact_no"
                                                value="{{ auth()->user()->mother_contact_no }}"
                                                onkeypress="return numberOnly(event)" maxlength="11" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Father's name</label>
                                            <input type="text" class="form-control" name="father_name"
                                                value="{{ auth()->user()->father_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="father_contact_no"
                                                value="{{ auth()->user()->father_contact_no }}"
                                                onkeypress="return numberOnly(event)" maxlength="11" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-8 mb-3">
                                            <label class="mb-2">Guardian's name</label>
                                            <input type="text" class="form-control" name="guardian_name"
                                                value="{{ auth()->user()->guardian_name }}" readonly>
                                        </div>
                                        <div class="form-group col-lg-4 mb-3">
                                            <label class="mb-2">Contact No.</label>
                                            <input type="text" class="form-control" name="guardian_contact_no"
                                                value="{{ auth()->user()->guardian_contact_no }}"
                                                onkeypress="return numberOnly(event)" maxlength="11" readonly>
                                        </div>
                                    </div>
                                    {{-- <button type="submit" class="btn btn-round btn-primary float-right btnSave mb-4">
                                        Save
                                    </button> --}}
                            </form>
                        </div><!-- profile-witdget-descipriton -->
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 mb-3">
                    <div class="card mb-3">
                        {{-- @if (!empty(auth()->user()->profile_image))
                            <img alt="Profile pictur of {{ auth()->user()->student_firstname }}" src="{{ asset('image/profile/'.auth()->user()->profile_image) }}" class="img- card-img-top">
                            @else
                            <img alt="image" src="{{ asset('image/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                            @endif --}}
                        <div class="card-body">
                            <h5 class="card-title">Update Username and Password</h5><hr>
                            <form action="{{ route('student.profile.account') }}" method="POST">@csrf
                                {{-- <div class="form-group mb-3">
                                    <span class="alert alert-success" name="mess">{{ $message }}</span>
                                </div> --}}
                                <div class="form-group mb-3">
                                    <label class="mb-2">Username</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->username }}" name="username">
                                    @error('username') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                    @error('confirm_password') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </form>
                        </div>
                    </div>

                    {{-- upload picture --}}

                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Upload Picture</h5><hr>
                            <p class="alert alert-warning"><i class="fas fa-exclamation-triangle"></i> make sure 1x1 picture</p>
                            <form id="uploadImage">@csrf
                                <div class="input-group mb-3">
                                    <div class="custom-file mb-3">
                                        <input type="file" name="file" class="form-control" onchange="validate_fileupload(this.value);" accept="image/*" required>
                                        {{-- <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label> --}}
                                    </div>
                                    <div class="input-group-append mb-3">
                                        <button class="btn btn-info btnImageSave text-white">Upload</button>
                                    {{-- <span class="input-group-text" id="inputGroupFileAddon02">Upload</span> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('student/profile.js') }}"></script>
<script src="{{ asset('js/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });

let  validate_fileupload =(fileName)=>
    {
    var allowed_extensions = new Array("jpg","png","jpeg");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true; // valid file extension
        }
    }
    getToast("warning", "Warning", 'File not accepted');
    $(this).val(null);
}
</script>
@endsection