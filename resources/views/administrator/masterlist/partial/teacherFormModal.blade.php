<!-- Modal -->
<form id="teacherForm" method="POST" autocomplete="off">@csrf
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group mb-3">
                        <label class="mb-2">Employee ID.</label>
                        <input type="text" name="roll_no" class="form-control" onkeypress="return numberOnly(event)" maxlength="7" required autofocus>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">First name</label>
                        <input type="text" name="firstname" class="form-control" style="text-transform: capitalize;" required>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Middle name</label>
                        <input type="text" name="middlename" class="form-control" style="text-transform: capitalize;" required>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Last name</label>
                        <input type="text" name="lastname" class="form-control" style="text-transform: capitalize;" required>
                        <small class="form-text text-danger"></small>
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info text-white" id="btnSave">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- Modal end --}}