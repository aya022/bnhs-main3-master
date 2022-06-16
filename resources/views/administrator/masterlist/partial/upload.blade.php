<!-- Modal -->
<form id="studentReq" method="POST">@csrf
    <div class="modal fade" id="uploadModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalTitle">Update Requirement | <span class="sname"></span></h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="studID">
                    <div class="form-check">
                        <input class="form-check-input checkme"  type="checkbox" name="grade" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Latest Copy of Grades</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checkme" type="checkbox" name="good" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">Good Moral Certificate</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input checkme" type="checkbox" name="psa" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">PSA Birth Certificate</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary text-white"  data-coreui-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>