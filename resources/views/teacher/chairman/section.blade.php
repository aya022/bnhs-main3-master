@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('teacher/chairman/partial/deleteModal')
{{-- <section class="section"> --}}
    <div class="container-fluid">
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><i class="fas fa-award"></i>&nbsp;&nbsp;Manage Section | Grade {{ auth()->user()->chairman_info->grade_level }} Chairman</p>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 20px;">Manage Section</p>
                    </div>
                    <div class="card-body pb-1">
                        <div class="table-responsive">
                            <table class="table table-striped" style="font-size: 14px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section name</th>
                                        <th>Curiculum</th>
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
                    <div class="card-header">
                        <p style="font-size: 20px;">Add Section</p>
                    </div>
                    <div class="card-body m-1">
                        <form id="sectionForm">@csrf
                            <input type="hidden" name="id">
                            <div class="form-group mb-3">
                                <label class="mb-2">Section / Class Name</label>
                                <input type="text" class="form-control" name="section_name" required>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2">Class Type</label>
                                <select name="class_type" class="form-select" required>
                                    <option value=""></option>
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
    </div><!-- section-body -->
{{-- </section> --}}
@endsection

@section('moreJs')
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('teacher/chairman/section.js') }}"></script>
@endsection