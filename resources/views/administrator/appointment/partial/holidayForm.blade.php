<form id="holidayForm">@csrf
    <div class="modal fade" id="holidayModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="holidayModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="holidayModalLabel">Add New Event</h5>
                    <button type="button" class="btn-close btnCancelHoliday" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0">
                    <input type="hidden" name="id">
                    <div class="form-group mb-2">
                        <label class="mb-2">Select date from</label>
                        <input class="form-control datepicker1" name="holi_date_from" required autocomplete="off">
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-2">Select date to</label>
                        <input class="form-control datepicker2" name="holi_date_to" autocomplete="off">
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-2">Description</label>
                        <textarea class="form-control" data-height="80" name="description" required autocomplete="off"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="mystatus" class="mb-2">Status</label>
                        <select id="mystatus" class="form-select" name="status" required>
                            <option value="Enable">Enable</option>
                            <option value="Disable">Disable</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white btnCancelHoliday">Close</button>
                    <button type="submit" class="btn btn-info text-white btnSaveHoliday">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>