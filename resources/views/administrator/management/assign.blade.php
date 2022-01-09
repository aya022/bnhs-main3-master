@extends('../layout/app')
@section('moreCss')
{{-- <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('administrator/management/partial/AssignDeleteModal')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-tasks  color-font"></i>&nbsp;&nbsp;Manage Subject Teacher</p>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header"><p style="font-size: 20px;">Manage Subject Teacher</p></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Filter:</label>
                                        <select class="form-select" id="inputGroupSelect01"  name="grade_level_top">
                                            <option value="">Choose Grade Level</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                        </select>
                                        <select class="form-select" id="inputGroupSelect01"  name="showSection">
                                            <option value="">Choose Section</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </form>
                            <div class="table-responsive pb-0">
                                <table class="table table-striped" style="font-size: 13px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Descriptive Title</th>
                                            <th>Subject Teacher</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="assignTable">
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
                        <div class="card-header"><p style="font-size: 20px;">Add Subject Teacher</p></div>
                        <div class="card-body m-1">
                            <form id="AssignForm">@csrf
                                <input type="hidden" name="id">
                                <div class="form-group mb-3">
                                    <label class="mb-2">Grade Level</label>
                                    <select name="grade_level" class="form-select" required>
                                        {{-- <option selected>Choose...</option> --}}
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Class</label>
                                    <select name="section_id" class="form-select" required>
                                        <option value="">Choose...</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Subject</label>
                                    <select name="subject_id" class="form-select" required>
                                        <option value="">Choose...</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2">Subject Teacher</label>
                                    <select name="teacher_id" class="form-control select2" required>
                                        <option value="">Choose...</option>
                                        @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->teacher_lastname.', '.$teacher->teacher_firstname.' '.$teacher->teacher_middlename }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btnSaveAssign">Submit</button>
                                <button type="submit" class="btn btn-warning cancelAssign">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div><!-- col-lg-4 -->
            </div><!-- row -->
        </div><!-- section-body -->
        </div>
</section>
@endsection

@section('moreJs')
{{-- <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script> --}}
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('administrator/management/assign.js') }}"></script>
@endsection