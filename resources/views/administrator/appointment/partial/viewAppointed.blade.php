<!-- Modal -->
<div class="modal fade" id="appointedModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="appointedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="appointedModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="float-left mb-3">
                        <button type="button" class="btn btn-icon icon-left btn-info text-white mr-3" id="printAppointed">
                            <i class="fas fa-print"></i> Print Now
                        </button>
                        <button type="button" class="btn btn-icon icon-left btn-primary mr-3" id="btnSendEmail">
                            <i class="fa fa-paper-plane"></i> Send Email for All
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {{-- <p class="alert alert-info">
                                Reminders: <br>
                                    * Click "Send Email for All" button to send to all appointee a message through email. <br>
                                    * Click checkbox to select a specific person to send a message through email. <br>
                                    * Click "confirm" button to change the status from pending appointment to done. It will indicate that those person with a "done" status is done with their appointment.
                                </p> --}}
                            </p>
                        </div>
                    </div>
                    <table class="table table-striped" id="appointedTable" style="font-size: 12px;width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Transaction No.</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Purpose</th>
                                <th>Appointee Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            
                <form class="was-validated mt-5" id="sendEmailForm">
                    <div class="mb-3">
                        <h6>Compose email message</h6>
                        <input type="hidden" name="selectedDateNow">
                        <textarea name="bodyEmail" class="summernote"  data-height="50" placeholder="Compose message here" required>
                            Subject: Your Appointment Is Confirmed <br><br>

                            Hi Appointee,<br><br>

                            Your [type of appointment] appointment is confirmed for [day of week], [month] [date]], [year]. <br><br>

                            Need to change your appointment?<br><br>

                            To make changes to your appointment, click here, call 09777924723, or respond to this email.
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning text-white sendCancel">Close</button>
                        <button type="submit" class="btn btn-primary btnSendEmail">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>