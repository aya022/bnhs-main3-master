
<!-- Modal -->
<form id="enrollAssignForm" method="POST">@csrf
    <div class="modal fade" id="enrollStudentModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="enrollStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Enroll Student</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <input type="hidden" name="enroll_id">
                <input type="hidden" name="status_now">
                <div class="form-group mb-3">
                    <label class="mb-2">Fullname</label>
                    <input type="text" class="form-control" name="fullname_again" readonly>
                    </div>
                <div class="row">
                    <div class="form-group mb-3 col-md-6">
                        <label class="mb-2">Grade level</label>
                        <select name="grade_level_again"  class="form-select">
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                        </select>
                        </div>
                    <div class="form-group mb-3 col-md-6">
                    <label class="mb-2">Learning Reference No.</label>
                    <input type="text" class="form-control" name="lrn_again" readonly>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="mb-2">Curriculum</label>
                    <select name="curriculum_again" class="form-select">
                        {{-- <option value="STEM">STEM - Science Technology Engineering and Mathematics</option> --}}
                        <option value="BEC">BEC - Basic Education Curriculum</option>
                        {{-- <option value="SPA">SPA - Special Program Art</option> --}}
                        {{-- <option value="SPJ">SPJ - Special Program Journalism</option> --}}
                    </select>
                </div>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Action Taken
                        <span class="badge bg-primary bg-pill action_taken_again">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Enrollment Status
                        <span class="badge bg-pill enroll_status_again">2</span>
                    </li>
                    </ul>
                    <div class="form-group mb-3">
                    <label class="mb-2">Assign Section</label>
                    <select class="form-control" id="sectionFilter" name="section_again" required></select>
                </div>
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning text-white btnCancelSectionNow" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSaveSectionNow">Enroll Student</button>
        </div>
        </div>
    </div>
    </div>
</form>