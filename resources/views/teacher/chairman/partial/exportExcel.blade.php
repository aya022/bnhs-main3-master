<form id="exportForm">@csrf
    <div class="modal fade" id="modalExport" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="modalExportLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content pb-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExportLabel">Export File</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-0 mb-2">
                    <div class="form-group mb-3">
                        <label for="myFormat" class="mb-2">Format</label>
                        <select id="myFormat" class="form-select">
                            <option value=".xlsx">XLSX</option>
                            <option value=".xls">XLS</option>
                            <option value=".csv">CSV</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="mystatus" class="mb-2">Status</label>
                        <select id="mystatus" class="form-select">
                            <option value="All">All</option>
                            <option value="Pending">Pending</option>
                            <option value="Enrolled">Enrolled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btnGenerate">Generate</button>
                </div>
            </div>
        </div>
    </div>
</form>