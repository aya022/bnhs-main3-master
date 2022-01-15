@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection

@section('content')
<!-- Modal -->
@include('teacher/chairman/partial/enrollForm')
@include('teacher/chairman/partial/setSectionForm')
@include('teacher/chairman/partial/exportExcel')
@include('teacher/chairman/partial/listEnrolled')
@include('teacher/chairman/partial/viewRequirement')
@include('teacher/chairman/partial/deleteModal')
@include('teacher/chairman/partial/enrollAssignSection')
{{-- Modal end --}}

<div class="container-fluid">
    <input type="hidden" name="current_curriculum" value="BEC">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="col-12">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-8">
                    <p style="font-size: 25px;"><i class="far fa-address-card"></i>&nbsp;&nbsp;Enrolle's List [ <b>Grade {{ Auth::user()->chairman_info->grade_level }} | BEC Student</b> ]</p>
                </div>
                <div class="col-lg-2 col-md-2 ">
                    <div class="btn-group my-4 float-right" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-primary" id="btnModalExport"><i
                                class="fas fa-file-export"></i>&nbsp;Export
                        </button>
                        <button type="button" class="btn btn-primary" id="btnModalStudent"><i
                                class="fas fa-plus-circle"></i>&nbsp;Student
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row sectionListAvailable mb-3"></div>
            <div class="card mb-3 shadow">
                <div class="card-body">
                    <div class="table-responsive">
                    <form id="massSectioningForm">
                        @include('teacher/chairman/partial/massSection')
                        {{-- <div class="col-lg-2 float-left mb-3 mt-2">
                            <select class="form-select mr-sm-2" name="selectBarangay"></select>
                        </div> --}}
                        <table class="table table-striped" style="font-size: 13px;" id="tableCurriculum">
                            <thead>
                                <tr>
                                    <th width="2%"></th>
                                    <th width="10%">Enrollment No</th>
                                    <th>LRN</th>
                                    <th>Fullname</th>
                                    <th width="10%">Section</th>
                                    <th width="8%">Status</th>
                                    <th width="10%">Balik Aral</th>
                                    <th width="10%">Action Taken</th>
                                    <th width="8%">State</th>
                                    <th>Date uploaded</th>
                                    <th width="10%">Requirements</th>
                                    <th width="13%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="12" class="text-center">No available data</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- row -->
</div>
@endsection

@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('teacher/chairman/enroll.js') }}"></script>
{{-- <script src="{{ asset('teacher/chairman/threeCurriculum.js') }}"></script> --}}
<script src="{{ asset('teacher/chairman/stem.js') }}"></script>
@endsection