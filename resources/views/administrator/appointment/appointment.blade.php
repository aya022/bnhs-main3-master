@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.checkboxes.css') }}">
<link rel="stylesheet" href="{{ asset('css/fullcalendar/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/summernote-bs4.css') }}">
@endsection
@section('content')
@include('administrator/appointment/partial/holidayForm')
@include('administrator/appointment/partial/viewAppointed')
@include('administrator/appointment/partial/deleteModal')
<style>
    .full {
        color: red;
        border: 1px solid red;
        background: black;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="deleteModal" data-coreui-backdrop="static" data-coreui-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mt-3 showText"></p>
                <button type="button" class="btn btn-warning btn-sm pl-3 pr-3 btnYes">Yes</button>&nbsp;&nbsp;
                <button type="button" class="btn btn-secondary btn-sm btnClose">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="callout border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between" style="margin-bottom: -20px;">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="fas fa-file-signature text-dark"></i>&nbsp;&nbsp;Appointment List</p>

            </div>
            <div class="col-lg-2 col-md-2" style="text-align: right">
                {{-- <button class="btn btn-icon icon-left btn-info my-4 float-right text-white" id="btnModalHoliday"><i class="fas fa-plus-circle"></i> Add Holiday</button> --}}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop" id="btnModalHoliday">
                    <i class="fas fa-plus-circle"></i> Add Event
                </button>
            </div>
        </div>
    </div>
</div>
<section class="body flex-grow-1 px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Manage Event</h5><hr>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="tableHoliday" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Legend</h5><hr>
                                <ul>
                                    <li style="background-color: #db5a44" class="text-center text-white">Full Appointment</li>
                                    <li></li>
                                    <li style="background-color: #9999ff" class="text-center text-white">Event</li>
                                    <li></li>
                                    <li style="background-color: #66cc66" class="text-center text-white">Vacant Appointment</li>
                                </ul>
                            </div>
                        </div>
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
<script src="{{ asset('js/datatable/dataTables.checkboxes.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/summernote-bs4.js') }}"></script>
<script src="{{ asset('administrator/appointment/appointment.js') }}"></script>
@endsection