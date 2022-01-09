@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection

@section('content')
@include('administrator/management/partial/deleteModal')
@include('administrator/management/partial/shsAddModal')
@include('administrator/management/partial/deleteShsSubjectModal')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-book-reader text-dark"></i>&nbsp;&nbsp;Manage Subject</p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Manage Subject for Junior High</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="float-right">
                                    <div class="row">
                                        <div class="col-3 my-1">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01">Filter:</label>
                                                <select class="form-select" id="selectedGL">
                                                    <option value="7">Grade 7</option>
                                                    <option value="8">Grade 8</option>
                                                    <option value="9">Grade 9</option>
                                                    <option value="10">Grade 10</option>
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
                                                <th>Subject Code</th>
                                                <th>Descriptive Title</th>
                                                <th>Type</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="subjectTable">
                                            <tr>
                                                <td colspan="6" class="text-center">No available data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- col-lg-8 -->
                
                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                    <div class="card">
                        <div class="card-header"><p style="font-size: 20px;">Add Junior High School Subject</p></div>
                        <div class="card-body m-1">
                            <form id="subjectForm" method="POST">@csrf
                                <input type="hidden" name="id">
                                <div class="form-group mb-3">
                                    <label>Grade Level</label>
                                    <select name="grade_level" class="form-select" required>
                                        <option value="7">Grade 7</option>
                                        <option value="8">Grade 8</option>
                                        <option value="9">Grade 9</option>
                                        <option value="10">Grade 10</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Subject Code</label>
                                    <input type="text" class="form-control" name="subject_code" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Descriptive Title</label>
                                    <input type="text" class="form-control" name="descriptive_title" required>
                                </div>
                                <div class="form-group mb-3" id="forJHS">
                                    <label>Type</label>
                                    <select name="subject_for" class="form-select">
                                        <option value="GENERAL">General</option>
                                        <option value="STEM">STEM - Science Technology Engineering and Mathematics</option>
                                        <option value="BEC">BEC - Basic Education Curriculum</option>
                                        <option value="SPA">SPA - Special Program Art</option>
                                        <option value="SPJ">SPJ - Special Program Journalism</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btnSaveSubject text-white">Submit</button>
                                <button type="submit" class="btn btn-warning cancelSubject text-white">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div><!-- col-lg-4 -->
            </div><!-- row -->

            <!-- SHS -->
            
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <p style="font-size: 20px;">Manage Subject for Senior High</p>
                        </div>
                        <div class="col-2 float-right">
                            <button class="btn btn-primary add_subject"><i class="fas fa-plus-circle icon"></i> Add SH Subject</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-4">
                            <div class="input-group mb-3 mt-3">
                                <label class="input-group-text" for="inputGroupSelect01">Filter</label>
                                <select class="form-select" id="inputGroupSelect01"  name="filter_strand">
                                    @foreach ($strands as $item)
                                    <option value="{{ $item->id }}">{{ $item->strand }}</option>
                                    @endforeach
                                </select>
                                <select class="form-select" id="inputGroupSelect01"  name="filter_grade_level">
                                    <option value="11">Grade 11</option>
                                    <option value="12">Grade 12</option>
                                </select>
                                <select class="form-select" id="inputGroupSelect01"  name="filter_term">
                                    <option value="1st">First Term</option>
                                    <option value="2nd">Second Term</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-striped" id="shsTable">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    {{-- <th>Strand</th> --}}
                                    <th>Subject Code</th>
                                    <th>Descriptive Title</th>
                                    <th>Prerequisite</th>
                                    <th class="text-center">Action Taken</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- section-body -->
</section>
@endsection

@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>>
<script src="{{ asset('administrator/management/subject.js') }}"></script>
<script src="{{ asset('administrator/management/subject.shs.js') }}"></script>
@endsection