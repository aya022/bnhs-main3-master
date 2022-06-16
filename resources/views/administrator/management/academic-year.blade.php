@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('administrator/management/partial/yearDelete')
@include('administrator/management/partial/confirm')
{{-- <section class="section"> --}}
    {{-- <div class="section-body"> --}}
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Academic Year</p>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9 col-12">
                            <h5 class="card-title">Manage School Year</h5><hr>
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover text-center" id="school_year_Table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="65%">Academic Year</th>
                                            <th class="text-center" width="5%">Active</th>
                                            {{-- <th class="text-center" width="5%">1st Sem</th>
                                            <th class="text-center" width="5%">2nd Sem</th> --}}
                                            <th class="text-center" width="30%">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <h5 class="card-title text-center">Add School Year</h5><hr>
                            <form id="schoolYearForm">@csrf
                                <input type="hidden" name="id">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" required pattern="^[0-9]{4}$" maxlength="4" name="from" placeholder="Year from (eg. 2019)">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" readonly class="form-control" required pattern="^[0-9]{4}$" maxlength="4" name="to" placeholder="Year to (eg. 2020)">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-info text-white btn-block" id="btnSaveAY">Submit</button>
                                </div>
                                {{-- <div class="col-4 mb-3">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupSelect01">Add School Year:</label>
                                            <input type="text" class="form-control" required pattern="^[0-9]{4}$" maxlength="4"
                                                name="from" placeholder="Year from (eg. 2019)">
                                            <input type="text" readonly class="form-control" required pattern="^[0-9]{4}$"
                                                maxlength="4" name="to" placeholder="Year to (eg. 2020)">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-info text-white" id="btnSaveAY">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
{{-- </section> --}}
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('administrator/management/school-year.js') }}"></script>
@endsection