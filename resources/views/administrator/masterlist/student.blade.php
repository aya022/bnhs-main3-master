@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
<!-- Modal -->
@include('administrator/masterlist/partial/modal')
@include('administrator/masterlist/partial/studentDeleteModal')
{{-- Modal end --}}

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between" style="margin-bottom: -20px;">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="fas fa-id-badge text-dark"></i>&nbsp;&nbsp;Student Masterlist</p>
            </div>
            {{-- <div class="col-lg-2 col-md-2 col-12" style="text-align: right">
                <!-- Button trigger modal -->
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button class="btn float-right btn-primary my-4"  id="btnStudentModal" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">
                        <i class="fas fa-plus-circle"></i>&nbsp;Add Student
                    </button>
                </div>
            </div> --}}

            {{-- <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Filter</label>
                <select class="form-select" id="inputGroupSelect01"  name="school_year_id"> --}}
                    {{-- @foreach ($yearList as $item)
                        <option value="{{ $item->id }}" {{ $item->status=='1'?'selected':'' }}>{{ $item->from.'-'.$item->to }}</option>
                    @endforeach --}}
                {{-- </select>
                <select class="form-select" id="inputGroupSelect01"  name="selectedGL">
                    <option value="all">All</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                </select>
                <button class="btn btn-info text-white" id="button-addon2" name="btnExport" type="button">Export Enrollee</button>
            </div> --}}
        </div>
    </div>
        {{-- table --}}
    <div class="col-12">
        <div class="card">
            <div class="card-body mt-2">
                <div class="table-responsive">
                    <table class="table table-striped" id="studentTable">
                        <thead>
                            <tr>
                                <th>LRN</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Contact No.</th>
                                <th>Completer</th>
                                <th>Username</th>
                                {{-- <th>Passwsord</th> --}}
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script>
    const active={{ json_encode($studentId) }}
</script>
<script src="{{ asset('administrator/masterlist/student.js') }}"></script>
@endsection