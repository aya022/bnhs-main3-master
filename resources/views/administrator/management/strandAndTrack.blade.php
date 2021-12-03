@extends('../layout/app')
@section('content')
@include('administrator/management/partial/deleteModal')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-tasks"></i>&nbsp;&nbsp;Track and Strand</p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Manage Track and Strand</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" style="font-size: 13px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Strand and Specialization</th>
                                            <th>Description</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="strandTable">
                                        <tr>
                                            <td colspan="5" class="text-center">No available data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- col-lg-8 -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Add Track and Strand</p>
                        </div>
                        <div class="card-body m-1">
                            <form id="strandForm">@csrf
                                <input type="hidden" name="id" id="idForStrand">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Strand Name</label>
                                    <input type="text" class="form-control" name="strand" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Description</label>
                                    <input name="description" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btnSaveStrand">Submit</button>
                                <button type="submit" class="btn btn-warning cancelStrand">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div><!-- col-lg-4 -->
            </div><!-- row -->
        </div>
    </div><!-- section-body -->
</section>
@endsection

@section('moreJs')
<script src="{{ asset('administrator/management/strand.js') }}"></script>
@endsection