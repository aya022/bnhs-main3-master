<form id="studentForm" method="POST">@csrf
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Student Details</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Parent Details</a>
                        </li>
                    </ul>


                    {{-- <form id="studentForm">@csrf --}}
                        <input type="hidden" name="id">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active mt-3" id="nav-home">
                                {{-- start student details here --}}
                                    <div class="form-group mb-3">
                                        <label class="mb-2">Learning Reference Number</label>
                                        <input type="text" name="roll_no" required class="form-control" onkeypress="return numberOnly(event)" maxlength="12">
                                    </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">First name</label>
                                        <input type="text" class="form-control" name="student_firstname"  style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Middle name</label>
                                        <input type="text" class="form-control" name="student_middlename"  style="text-transform: capitalize;">
                                    </div>
                                    <div class=" form-group mb-3 col-md-4">
                                        <label class="mb-2">Last name</label>
                                        <input type="text" class="form-control" name="student_lastname"  style="text-transform: capitalize;" required>
                                    </div>
                                </div>

                                <div class="row" id="forNew">
                                    <div class="form-group col-md-3">
                                        <label>Region</label>
                                        <select name="region_text" id="region" class="form-select" required></select>
                                        <input type="hidden" name="region">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Province</label>
                                        <select name="province_text" id="province" class="form-select"
                                            required></select>
                                        <input type="hidden" name="province">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Town</label>
                                        <select name="city_text" id="city" class="form-select" required></select>
                                        <input type="hidden" name="city">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Barangay</label>
                                        <select name="barangay_text" id="barangay" class="form-select"
                                            required></select>
                                        <input type="hidden" name="barangay">
                                    </div>
                                </div>

                                <div class="row" id="forUpdate">
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="mb-2">Region</label>
                                        <input type="text" name="region"  style="text-transform: capitalize;" required class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="mb-2">Province</label>
                                        <input type="text" name="province"  style="text-transform: capitalize;" required class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="mb-2">Town</label>
                                        <input type="text" name="city"  style="text-transform: capitalize;" required class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="mb-2">Barangay</label>
                                        <input type="text" name="barangay"  style="text-transform: capitalize;" required class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Date of Birth</label>
                                        <input type="date" class="form-control" placeholder="DD/MM/YYYY"
                                            name="date_of_birth">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Gender</label>
                                        <select class="form-select" name="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Contact No.</label>
                                        <input type="text" class="form-control" name="student_contact"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)" maxlength="11">
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label>Last school attended</label>
                                    <input type="text" class="form-control" name="last_school_attended" required>
                                </div> --}}

                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Grade 10 Completer?</span>
                                        </div>
                                        <select name="completer" class="form-select">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- end student details here --}}
                            </div>
                            <div class="tab-pane fade mt-3 mb-3" id="nav-profile">
                                {{-- start parent details here --}}
                                <div class="row">
                                    <div class="form-group mb-3 col-md-8">
                                        <label class="mb-2">Father's name</label>
                                        <input type="text" class="form-control" name="father_name"  style="text-transform: capitalize;">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2">Contact No.</label>
                                        <input type="text" class="form-control" name="father_contact_no"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)" maxlength="11">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-8">
                                        <label class="mb-2">Mother's name</label>
                                        <input type="text" class="form-control" name="mother_name"  style="text-transform: capitalize;">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Contact No.</label>
                                        <input type="text" class="form-control" name="mother_contact_no"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)" maxlength="11">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-md-8">
                                        <label class="mb-2">Guardian's name</label>
                                        <input type="text" class="form-control" name="guardian_name"  style="text-transform: capitalize;">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label class="mb-2">Contact No.</label>
                                        <input type="text" class="form-control" name="guardian_contact_no"
                                            pattern="^[0-9]{11}$" onkeypress="return numberOnly(event)" maxlength="11">
                                    </div>
                                </div>
                                {{-- end parent details here --}}
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
                <div class="modal-footer pt-0">
                    <button type="button" class="btn btn-warning pl-2 pr-2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary pl-4 pr-4" id="btnSaveStudent">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>