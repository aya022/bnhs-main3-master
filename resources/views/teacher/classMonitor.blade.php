@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
@include('teacher/partial/classMonitorDeleteModal')
<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <p style="font-size: 25px;"><i class="far fa-address-card"></i>&nbsp;&nbsp;My Class [ <b><span class="text-success">{{ Auth::user()->section_info->section_name }}</span></b> ]</p>
    </div>
    <div class="card card-info mb-3">
        <div class="card-header">
            <p style="font-size: 20px;">Manage Class</p>
        </div>
        <div class="card-body pb-1">
            {{-- <div class=""> --}}
                {{-- table-responsive--}}
                <table class="table table-striped" id="myClassTable" style="font-size: 14px" width="100%">
                    <thead>
                        <tr>
                            <th>LRN</th>
                            <th>Student name</th>
                            <th>Gender</th>
                            <th>Contact No.</th>
                            <th>Status</th>
                            <th width="8%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('teacher/classMonitor.js') }}"></script>
@endsection