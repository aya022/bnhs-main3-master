@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
<style>
    .failGrade {
        color: red;
    }

    .noborder {
        width: 95%;
        border: none;
        border-color: transparent;
        background: transparent;
        outline: none;
    }
</style>
@endsection
@section('content')
{{-- modal --}}
<div class="modal fade" id="fillGradeInPrevious" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="fillGradeInPreviousLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="mt-3"><i class="fas fa-exclamation-triangle"></i> Please fill previous grading period</p>
                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- <section class="section"> --}}
    <div class="container-fluid">
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><i class="fas fa-pen"></i>&nbsp;&nbsp;Grading Sheet</p>
        </div>
        <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Manage Grade</h5><hr>
                    <div class="table-responsive">
                        <table class="table table-stripped table-bordered">
                            <tr class="">
                                <th class="  bg-dark text-white">SUBJECT</th>
                                <th colspan="5" class=" bg-dark text-white"><h6 class="show_subject text-center" style="text-transform: uppercase;"></h6></th>
                            </tr>
                            <tr>
                                <th width="50px" class="">STUDENT</th>
                                <th width="25px"colspan="4" class="text-center">QUARTER</th>
                                <th rowspan="2" width="25px" class="text-center ">Final Rating</th>
                            </tr>
                            <tr>
                                <th class="">Fullname</th>
                                <th width="10px" class="text-center">1st</th>
                                <th width="10px" class="text-center">2nd</th>
                                <th width="10px" class="text-center">3rd</th>
                                <th width="10px" class="text-center">4th</th>
                            </tr>
                            <tbody id="loadstudent">
                                <tr class="text-center">
                                    <td colspan="6">No data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="card card-info">
                <div class="card-body">
                    <h5 class="card-title">Filter data</h5><hr>
                    <div class="form-group mb-3">@csrf
                        <label class="mb-2">Grade Level</label>
                        <select class="form-select" name="grade_level">
                            <option >Choose Grade Level</option>
                            <option value="7">Grade 7</option>
                            <option value="8">Grade 8</option>
                            <option value="9">Grade 9</option>
                            <option value="10">Grade 10</option>
                        </select>
                    </div>
                    <div class="form-group mb-3" id="show_section"></div>
                    <div class="form-group mb-3" id="show_subject"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </section> --}}
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('administrator/management/grading.js') }}"></script>
@endsection