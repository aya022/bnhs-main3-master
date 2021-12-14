<form id="setSectionForm">@csrf
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
                    <div class="form-group mt-2 mb-3">
                        <label for="sectionFilter" class="mb-2">Section</label>
                        <select class="form-select" id="sectionFilter" name="section" required></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white btnCancelSectionNow">Cancel</button>
                    <button type="submit" class="btn btn-primary text-white btnSaveSectionNow">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
                </div>
            </div>
        </div>
    </div>
</form>