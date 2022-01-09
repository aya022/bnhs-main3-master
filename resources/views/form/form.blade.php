<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>eBNHS . Pre-Enrollment</title>

    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simple-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toast/iziToast.min.css') }}">
  
</head>

<body>
  <div id="app">
      <!-- warning -->
      <div class="modal modal-outline shadow-sm fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title lead" id="staticBackdropLabel">Warning</h5>
                        <button type="button" class="close btnCancelHoliday" data-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none;">
                            <span aria-hidden="true" style="font-size: 20px;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 class="txt text-warning"></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

      <section class="section">
          <div class="container mt-2">
              <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-12 offset-lg-0 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2 text-center">
                                        <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid " style="height: 100px;">
                                    </div>
                                    <div class="col-2 text-center">
                                        <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid " style="height: 100px;">
                                    </div>  
                                    
                                    <div class="col-6"><br>
                                        <b>
                                            <h6 class="mb-1">REQUIREMENTS FOR INCOMING GRADE 7, TRANSFEREES AND BALIK
                                                ARAL</h6>
                                            <p class="mb-0" style="font-size: 14px">Copy of Latest Grades &middot; Copy of Good Moral
                                                Certificate &middot; Copy of PSA Birth
                                                Certificate</p>
                                            <address class="mb-0" style="font-size: 14px">
                                                <i class="fa fa-phone" style="color:  #0066ff;"></i>&nbsp;&nbsp;0917-112-7716&nbsp;&nbsp;
                                                <i class="fa fa-at" style="color:  #0066ff;"></i>&nbsp;&nbsp;302016@deped.gov.ph&nbsp;&nbsp;
                                                <i class="fab fa-facebook" style="color:  #0066ff;"></i>&nbsp;&nbsp;@balaogannationalhighschool  
                                            </address>
                                        </b>
                                    </div>
                                    <div class="col-2 text-center">
                                        <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" style="height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mt-3">
                                <p style="font-size: 13px;" class="alert alert-warning shadow">
                                    <b><i><i class="fas fa-exclamation-triangle"></i> Please put N/A if not Applicable.</i><br>
                                    <i class="fas fa-exclamation-triangle"></i> Please fill out the all the required field and provide an accurate and complete information to avoid inconvinience.</b>
                                </p>
                            </div>
                        </div>
                        <!-- -->
                        <div class="card card-primary shadow mt-2">
                            <div class="card-body">
                                <h3>Enrollment Form</h3>
                            <form id="enrollForm" autocomplete="off">@csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="row">
                                            <div class="form-group col-12 mb-3">
                                                <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Learning Reference Number (LRN)</label>
                                                <input name="roll_no" type="text" class="form-control" onkeypress="return numberOnly(event)" maxlength="12" required autofocus>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Status</label>
                                                <select name="status" class="form-select" id="">
                                                    <option value="">Select Status</option>
                                                    <option value="new">Incoming grade 7</option>
                                                    <option value="new_eleven">Incoming grade 11</option>
                                                    <option value="transferee">Transferee</option>
                                                    <option value="balikAral">Balik Aral</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 mb-3">
                                                <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Grade level to Enroll</label>
                                                <select name="grade_level" class="form-select" id="">
                                                    <option value="">Select Grade level</option>
                                                    <option value="7">Grade 7</option>
                                                    <option value="8">Grade 8</option>
                                                    <option value="9">Grade 9</option>
                                                    <option value="10">Grade 10</option>
                                                    <option value="11">Grade 11</option>
                                                    <option value="12">Grade 12</option>
                                                </select>
                                            </div>
                                        </div>
                        
                                            <div class="form-group mb-3" id="forBalik">
                                                <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Last school year attended (Balik-Aral)</label>
                                                <input name="last_schoolyear_attended" type="text" class="form-control" placeholder="eg. 2018-2019" style="text-transform: capitalize;">
                                            </div>
                        
                                            <div class="row">
                                                <div class="form-group col-12 mb-3" id="forcurriculum">
                                                    <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Curriculum</label>
                                                    <select name="curriculum" class="form-select">
                                                        <option value="">Select Curriculum</option>
                                                        {{-- <option value="STEM">STEM - Science Technology Engineering and Mathematics</option> --}}
                                                        <option value="BEC">BEC - Basic Education Curriculum</option>
                                                        {{-- <option value="SPA">SPA - Special Program Art</option> --}}
                                                        {{-- <option value="SPJ">SPJ - Special Program Journalism</option> --}}
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 mb-3" id="forStrand">
                                                    <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Strand & Specialization</label>
                                                    <select name="strand" class="form-select">
                                                        <option value="">Select Strand</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-12 mb-3">
                                                    <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Last school attended</label>
                                                    <input name="last_school_attended" type="text" class="form-control" required style="text-transform: capitalize;">
                                                </div>
                                            </div>
                                    </div>
                                    <!-- -->
                                    
                                    <div class="col-md-6 col-lg-8">
                                        <div class="col-12">
                                            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                                                <li class="nav-item">
                                                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#personalInfo" role="tab" aria-controls="home" aria-selected="true"><i class=" fas fa-user-check"></i> Personal Information</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#parentInfo" role="tab" aria-controls="profile" aria-selected="false"><i class=" fas fa-users"></i> Parent Information</a>
                                                </li>
                                                <li class="nav-item">
                                                <a class="nav-link" id="contact-tab2" data-toggle="tab" href="#uploadReq" role="tab" aria-controls="contact" aria-selected="false"><i class=" fas fa-cloud-upload-alt"></i> Upload Requirements</a>
                                                </li>
                                            </ul>
                                            <!-- -->
                                        </div>

                                        <div class="tab-content" id="myTab3Content">
                                            <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="home-tab2">
                                                <!-- tab 1 -->
                                                <!-- personal information -->
                                                <div class="row">
                                                    <div class="form-group col-6 mb-3 mt-3">
                                                        <label class="form-label" for="frist_name"><b style="color: #ff0000">*</b>&nbsp;First Name</label>
                                                        <input id="frist_name" type="text" class="form-control" name="student_firstname" autofocus required style="text-transform: capitalize;">
                                                    </div>
                                                    <div class="form-group col-6 mb-3 mt-3">
                                                        <label class="form-label" for="last_name">Middle Name</label>
                                                        <input id="last_name field_ucfirst" type="text" class="form-control" name="student_middlename" style="text-transform: capitalize;">
                                                    </div>
                                                    <div class="form-group col-6 mb-3">
                                                        <label class="form-label" for="last_name"><b style="color: #ff0000">*</b>&nbsp;Last Name</label>
                                                        <input id="last_name field_ucfirst" type="text" class="form-control" name="student_lastname" style="text-transform: capitalize;" required>
                                                    </div>
                                                    <div class="form-group col-6 mb-3">
                                                        <label class="form-label">Extension Name <i>(Optional)</i> </label>
                                                        <input type="text" class="form-control" placeholder="example (Jr, Sr, etc.)" style="text-transform: capitalize;" name="student_extension">
                                                        </div>
                                                    <div class="form-group col-lg-4 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Date of Birth</label>
                                                        <input type="date" class="form-control" name="date_of_birth" required>
                                                    </div>
                                                    <div class="form-group col-lg-4 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Gender</label>
                                                        <select name="gender" class="form-select" id="" required>
                                                            <option value="">Select Gender</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-4 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Student Contact No.</label>
                                                        <input type="text" class="form-control" name="student_contact"
                                                            onkeypress="return numberOnly(event)" maxlength="11">
                                                    </div>
                                                </div>
                                                <!-- end -->
                                                <!-- address -->
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Region</label>
                                                        <select name="region_text" id="region" class="form-select form-control" >
                                                            <option value="">Select Region</option>
                                                            <input type="hidden" name="region" id="">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Province</label>
                                                        <select name="province_text" id="province" class="form-select form-control" >
                                                            <option value="">Select Province</option>
                                                            <input type="hidden" name="province" id="">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Municipality/City</label>
                                                        <select name="city_text" id="city" class="form-select form-control" >
                                                            <option value="">Select Municipality/City</option>
                                                            <input type="hidden" name="city" id="">
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <label class="form-label"><b style="color: #ff0000">*</b>&nbsp;Barangay</label>
                                                        <select name="barangay_text" id="barangay" class="form-select" >
                                                            <option value="">Select Barangay</option>
                                                            <input type="hidden" name="barangay" id="">
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- end -->
                                                <!-- tab 1 end -->
                                            </div>
                                            <div class="tab-pane fade" id="parentInfo" role="tabpanel" aria-labelledby="profile-tab2">
                                                <!-- tab 2 -->
                                                <div class="row">
                                                    <div class="form-group col-lg-8 mb-3 mt-3">
                                                        <label class="form-label">Father's Name <em><small>(Last Name, First Name Middle Name)</small></em></label>
                                                        <input type="text" class="form-control" name="father_name" style="text-transform: capitalize;">
                                                    </div>
                                                    <div class="form-group col-lg-4 mb-3 mt-3">
                                                        <label class="form-label">Contact No.</label>
                                                        <input type="text" class="form-control" name="father_contact_no" wire:onkeypress="return numberOnly(event)"  maxlength="11">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-8 mb-3">
                                                        <label class="form-label">Mother's Name <em><small>(Last Name, First Name Middle Name)</small></em></label>
                                                        <input type="text" class="form-control" name="mother_name" style="text-transform: capitalize;">
                                                    </div>
                                                    <div class="form-group col-lg-4 mb-3">
                                                        <label class="form-label">Contact No.</label>
                                                        <input type="text" class="form-control" name="mother_contact_no"
                                                            onkeypress="return numberOnly(event)" maxlength="11">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-8 mb-3">
                                                        <label class="form-label">Guardian's Name <em><small>(Last Name, First Name Middle Name) <b>(* If not parent) </b></small></em></label>
                                                        <input type="text" class="form-control" name="guardian_name" style="text-transform: capitalize;">
                                                    </div>
                                                    <div class="form-group col-lg-4 mb-3">
                                                        <label class="form-label">Contact No.</label>
                                                        <input type="text" class="form-control"
                                                            name="guardian_contact_no"
                                                            onkeypress="return numberOnly(event)" maxlength="11">
                                                    </div>
                                                </div>
                                                <!-- tab 2 end-->
                                            </div>
                                            <div class="tab-pane fade" id="uploadReq" role="tabpanel" aria-labelledby="contact-tab2">
                                                <!-- tab 3 -->
                                                <div class="mt-3">
                                                    <div class="alert alert-danger">
                                                        {{-- <small>* <b>Note:</b> Upload requirements are optional. Once you have pre-enrolled and they will double-check your information and requirements before the student assign to a section, the office will notify you that you must submit all hard copies of your requirements as follow up requirements.</small><br>    --}}
                                                        <small><i class="fas fa-exclamation-triangle"></i> <b>Note:</b> Upload requirements are optional. Once you have pre-enrolled and they will double-check your information and requirements before the student assign to a section.</small><br>   
                                                        <small><b>File format: ( png,jpeg,jpg )</b></small>
                                                    </div>
                                                        <div class="form-group mt-2">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="customFile">Latest Copy of Grades</label>
                                                                <input type="file" class="form-control" name="req_grade" accept=".png,.jpg,.jpeg" onchange="validate_fileupload(this.value);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="customFile">Good Moral Certificate</label>
                                                                <input type="file" class="form-control" name="req_goodmoral" accept=".png,.jpg,.jpeg"  onchange="validate_fileupload(this.value);">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="customFile">PSA Birth Certificate</label>
                                                                <input type="file" class="form-control" name="req_psa" accept=".png,.jpg,.jpeg"  onchange="validate_fileupload(this.value);">
                                                            </div>
                                                        </div>
                                                </div>
                                                {{-- tab 3 end --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-block">
                                    <button type="submit" class="btn btn-info btnEnroll" style="color: #fff;">
                                        <i class="fas fa-user-check btn-icon mr-2"></i> Enroll
                                    </button>
                                    <a href="/" class="btn btn-secondary" style="color: #fff;">
                                        <i class="fas fa-arrow-circle-left mr-2"></i>&nbsp;Back to Home</a>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- General JS Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/tooltip.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('js/jquery.selectric.min.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/toast/iziToast.min.js') }}"></script>
<script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/form.js') }}"></script>
<script src="{{ asset('js/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

<script>
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

</body>
</html>