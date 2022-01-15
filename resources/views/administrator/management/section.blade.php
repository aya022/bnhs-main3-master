@extends('../layout/app')
@section('moreCss')
{{-- <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('administrator/management/partial/deleteModal')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-puzzle-piece"></i>&nbsp;&nbsp;Section and  Adviser</p>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <p style="font-size: 20px;">Manage Class</p>
                        </div> --}}
                        <div class="card-body">
                            <h5 class="card-title">Manage Section</h5><hr>
                            <div class="float-right">
                                <div class="form-row align-items-center mt-3 ml-4 pb-0">
                                    <div class="col-3 ">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Grade Level</span>
                                            <select class="form-select bg-white dark:bg-dark" aria-label="Default select example" id="selectedGL">
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                {{-- <option value="11">11</option>
                                                <option value="12">12</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped" style="font-size: 13px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section name</th>
                                            <th>Type</th>
                                            <th>Adviser</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sectionTable">
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
                        {{-- <div class="card-header">
                            <p style="font-size: 20px;">Add Class and Adviser</p>
                        </div> --}}
                        <div class="card-body">
                            <h5 class="card-title">Add Section and Adviser</h5><hr>
                            <form id="sectionForm">@csrf
                                <input type="hidden" name="id">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Grade Level</label>
                                    <select name="grade_level" class="form-control" required>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Class Name</label>
                                    <input type="text" class="form-control" name="section_name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Class Type</label>
                                    <select name="class_type" class="form-control" required>
                                        {{-- <option value=""></option> --}}
                                        {{-- <option value="STEM">STEM - Science Technology Engineering and Mathematics</option> --}}
                                        <option value="BEC">BEC - Basic Education Curriculum</option>
                                        {{-- <option value="SPA">SPA - Special Program Art</option>
                                        <option value="SPJ">SPJ - Special Program Journalism</option> --}}
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Class Adviser</label>
                                    <select name="teacher_id" class="form-control select2" id="mySelect2" required>
                                        <option value=""></option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->teacher_lastname.', '.$teacher->teacher_firstname.' '.$teacher->teacher_middlename }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btnSaveSection"
                                    {{ (session()->has('sessionAY')!="")?now()->year==(1-session('sessionAY')->to)?'disabled':'':'' }}>Submit</button>
                                <button type="submit" class="btn btn-warning text-white cancelSection">Cancel</button>
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
{{-- <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script> --}}
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('administrator/management/section.js') }}"></script>
@endsection