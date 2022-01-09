<form id="enrollAssignForm">@csrf
    <div class="modal fade" id="setSectionModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-top modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Assign Section</h5>
                </div>
                <div class="modal-body pb-0 mb-2">
                    <div class="alert alert-warning text-center" role="alert"></div>
                    <input type="hidden" name="enroll_id">
                    <input type="hidden" name="status_now">
                    <div class="form-group mb-3">
                        <label class="mb-2">Name</label>
                        <input type="text" class="form-control nameOfStudent" readonly>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label class="mb-2" >Grade level</label>
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
                            <option value="BEC">BEC - Basic Education Curriculum</option>
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
                    <div class="form-group mt-2 mb-3">
                        <label for="sectionFilter" class="mb-2">Section</label>
                        <select class="form-select" id="sectionFilter" name="section" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning text-white btnCancelSectionNow">Cancel</button>
                    <button type="submit" class="btn btn-primary text-white btnSaveSectionNow">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </div>
</form>