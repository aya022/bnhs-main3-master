{{-- @extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-body">
        <div class="col-12">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-8">
                    <h2 class="section-title">Enrollee's Today</h2>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group my-3">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Filter</span>
                                </div>
                                <select class="custom-select" name="school_year_id">
                                    @foreach ($yearList as $item)
                                        <option value="{{ $item->id }}" {{ $item->status=='1'?'selected':'' }}>{{ $item->from.'-'.$item->to }}</option>
                                    @endforeach
                                </select>
                                <select class="custom-select" name="selectedGL">
                                    <option value="all">All</option>
                                    <option value="7">Grade 7</option>
                                    <option value="8">Grade 8</option>
                                    <option value="9">Grade 9</option>
                                    <option value="10">Grade 10</option>
                                    <option value="11_1st">Grade 11 First Sem</option>
                                    <option value="11_2nd">Grade 11 Second Sem</option>
                                    <option value="12_1st">Grade 12 First Sem</option>
                                    <option value="12_2nd">Grade 12 Second Sem</option>
                                </select>
                          <div class="input-group-append">
                            <button class="btn btn-primary" type="button" name="btnExport">Export Excel</button>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="">
                    <table class="table table-striped" id="enrollmentTable" style="font-size: 13px">
                        <thead>
                            <tr>
                                <th>LRN</th>
                                <th>Student name</th>
                                <th>Curriculum | Strand</th>
                                <th>Semester</th>
                                <th>Section</th>
                                <th>Status</th>
                                <th>Balik Aral</th>
                                <th>Enrolled Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/enrollment/enrollment.js') }}"></script>
@endsection --}}

@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')

<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between mb-2" style="margin-bottom: -20px;">
                    <div class="col-lg-3 col-md-3">
                        <p style="font-size: 25px;"><i class="fas fa-users text-dark"></i>&nbsp;&nbsp;Enrollee's List</p>
        
                    </div>
                    <div class="col-lg-4 col-md-4" style="text-align: right">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Filter</label>
                            <select class="form-select" name="school_year_id">
                                @foreach ($yearList as $item)
                                    <option value="{{ $item->id }}" {{ $item->status=='1'?'selected':'' }}>{{ $item->from.'-'.$item->to }}</option>
                                @endforeach
                            </select>
                            <select class="form-select" name="selectedGL">
                                <option value="all">All</option>
                                <option value="7">Grade 7</option>
                                <option value="8">Grade 8</option>
                                <option value="9">Grade 9</option>
                                <option value="10">Grade 10</option>
                                {{-- <option value="11_1st">Grade 11 First Sem</option>
                                <option value="11_2nd">Grade 11 Second Sem</option>
                                <option value="12_1st">Grade 12 First Sem</option>
                                <option value="12_2nd">Grade 12 Second Sem</option> --}}
                            </select>
                            <button class="btn btn-info text-white" id="button-addon2" name="btnExport" type="button"><i class="fas fa-file-export"></i>&nbsp;&nbsp;Export Enrollee</button>
                        </div>
                        {{-- <div class="mb-3">
                            
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="">
                        <table class="table table-striped" id="enrollmentTable" style="font-size: 14px">
                            <thead>
                                <tr>
                                    {{-- <th>#</th> --}}
                                    <th>LRN</th>
                                    <th>Student name</th>
                                    <th>Curriculum | Strand</th>
                                    {{-- <th>Semester</th> --}}
                                    <th>Section</th>
                                    <th>Status</th>
                                    <th>Balik Aral</th>
                                    <th>Enrolled Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/enrollment/enrollment.js') }}"></script>
@endsection