<input type="hidden" name="current_glc" value="{{ Auth::user()->chairman->grade_level }}">
<form id="enrollForm" method="POST">@csrf
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Enroll Student</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col-12">
                            <p>(<i>For walk-in Enrollee</i>)</p>
                        </div>
                        @if (Auth::user()->chairman->grade_level==7)
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">LRN (Learning Reference Number)</label>
                            <input type="text" class="form-control" name="roll_no" onkeypress="return numberOnly(event)" maxlength="12" required autofocus>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="nothing"></option>
                                <option value="new">Incomming grade 7</option>
                                <option value="transferee">Transferee</option>
                            </select>
                        </div>
                        @else
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="nothing"></option>
                                <option value="upperclass">Upper Class</option>
                                <option value="transferee">Transferee</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">LRN (Learning Reference Number)</label>
                            <input type="text" class="form-control" name="roll_no" pattern="^[0-9]{12}$"
                                onkeypress="return numberOnly(event)" maxlength="12" required>
                        </div>
                        @endif

                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Grade level to Enroll</label>
                            <select name="grade_level" class="form-select" id="" required>
                                <option></option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                                <option value="9">Grade 9</option>
                                <option value="10">Grade 10</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Curriculum</label>
                            <select name="curriculum" class="form-select" required>
                                <option value=""></option>
                                {{-- <option value="STEM">STEM - Science Technology Engineering and Mathematics</option> --}}
                                <option value="BEC">BEC - Basic Education Curriculum</option>
                                {{-- <option value="SPA">SPA - Special Program Art</option> --}}
                                {{-- <option value="SPJ">SPJ - Special Program Journalism</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-3" id="last_school">
                        <label class="mb-2">Last school attended</label>
                        <input type="text" class="form-control" name="last_school_attended" style="text-transform: capitalize;" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">First name</label>
                            <input type="text" class="form-control" name="student_firstname" style="text-transform: capitalize;" required>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Middle name</label>
                            <input type="text" class="form-control" name="student_middlename" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Last name</label>
                            <input type="text" class="form-control" name="student_lastname" style="text-transform: capitalize;" required>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label class="mb-2">Extension Name <i>(Optional)</i></label>
                            <input type="text" class="form-control" name="student_extension" placeholder="example (Jr, Sr, etc.)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Date of Birth</label>
                            <input type="date" class="form-control" required name="date_of_birth">
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Contact No.</label>
                            <input type="text" class="form-control" name="student_contact" pattern="^[0-9]{11}$"
                                onkeypress="return numberOnly(event)" maxlength="11" required>
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Section</label>
                            <select name="section_id" class="form-select">
                            </select>
                        </div>
                    </div>
                    <div class="row" id="notUpper">
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Region</label>
                            <select name="region_text" id="region" class="form-select">
                                {{-- <option value="region"></option> --}}
                            </select>
                            <input type="hidden" name="region">
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Province</label>
                            <select name="province_text" id="province" class="form-select">
                                {{-- <option value="province"></option> --}}
                            </select>
                            <input type="hidden" name="province">
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Town</label>
                            <select name="city_text" id="city" class="form-select">
                                {{-- <option value="city"></option> --}}

                                <input type="hidden" name="city">
                            </select>
                        </div>
                        <div class="form-group col-lg-3 mb-3">
                            <label class="mb-2">Barangay</label>
                            <select name="barangay_text" id="barangay" class="form-select">
                                {{-- <option value="barangay"></option> --}}
                            </select>
                            <input type="hidden" name="barangay">
                        </div>
                    </div>
                    <div class="form-group mb-3" id="forUpper">
                        <label class="mb-2">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8 mb-3">
                            <label class="mb-2">Father's name</label>
                            <input type="text" class="form-control" name="father_name" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="father_contact_no" pattern="^[0-9]{11}$"
                                onkeypress="return numberOnly(event)" maxlength="11">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8 mb-3">
                            <label class="mb-2">Mother's name</label>
                            <input type="text" class="form-control" name="mother_name" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            <label>Contact No.</label>
                            <input type="text" class="form-control" name="mother_contact_no" pattern="^[0-9]{11}$"
                                onkeypress="return numberOnly(event)" maxlength="11">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8 mb-3">
                            <label class="mb-2">Guardian's name</label>
                            <input type="text" class="form-control" name="guardian_name" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group col-lg-4 mb-3">
                            <label class="mb-2">Contact No.</label>
                            <input type="text" class="form-control" name="guardian_contact_no" pattern="^[0-9]{11}$"
                                onkeypress="return numberOnly(event)" maxlength="11">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modalClose">Close</button>
                    <button type="submit" class="btn btn-primary btnSaveEnroll">&nbsp;&nbsp;Enroll&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </div>
</form>