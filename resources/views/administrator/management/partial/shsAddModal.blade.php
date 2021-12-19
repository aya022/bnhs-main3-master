    <!-- Modal -->
    <form id="shsForm">@csrf
        <div class="modal fade" id="shsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add SHS Subject</h5>
                    <button type="button" class="btn-close btnCloseshs" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="shs_id">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label class="mb-2">Indidate type</label>
                                <select class="form-select" name="shs_indicate_type" required>
                                    <option value="">Choose type</option>
                                    <option value="Core">Core</option>
                                    <option value="Specialized">Specialized</option>
                                    <option value="Applied">Applied</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Grade level</label>
                                <select class="form-select" name="shs_grade_level">
                                    <option value="">Grade Level</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Strand</label>
                                <select class="form-select" name="shs_strand_id">
                                    <option value="">Choose strand</option>
                                    <option value="all">All strand</option>
                                    @foreach ($strands as $item)
                                    <option value="{{ $item->id }}">{{ $item->strand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Subject Code</label>
                                <input type="text" class="form-control" placeholder="Subject Code" name="shs_subject_code" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group mb-3">
                                <label class="mb-2">Descriptive title</label>
                                <input type="text" class="form-control" placeholder="Decriptive Title"  name="shs_descriptive_title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Term</label>
                                <select class="form-select" id="" name="shs_term">
                                    <option value="1st">First Term</option>
                                    <option value="2nd">Second Term</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Prerequisite</label>
                                <select name="shs_prerequisite" class="form-select" id="mySelect2">
                                    <option value="">Choose..</option>
                                    @foreach ($subjects as $item)
                                    <option value="{{ $item->id }}"><b>{{ $item->subject_code }}</b>{{ ' - '.$item->descriptive_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-warning text-white btnClose" data-dismiss="modal">Close</button>
                <button class="btn btn-warning text-white cancelSHS" type="button">Cancel</button>
                <button type="submit" class="btn btn-primary btnSHSsave">Save</button>
                </div>
            </div>
            </div>
        </div>
    </form>