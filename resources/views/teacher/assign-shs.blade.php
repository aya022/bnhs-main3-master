@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Assign Subject [ <span class="text-success">{{ Auth::user()->section->section_name }}</span> ]</p>
            </div>
            <div class="col-lg-2 col-md-2 my-4">
                @if (empty($activeAY))
                    <p>No active academic year</p>
                @else
                    <div class="float-right ">
                        <select class="form-select my-1 mr-sm-2" name="term">
                            @if ($activeAY->first_term=="Yes")
                                <option value="1st">1st Term</option>
                            @endif
                            @if ($activeAY->second_term=="Yes")
                                <option value="2nd">2nd Term</option>
                            @endif
                        </select>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <form id="assignForm">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-text" id="btnGroupAddon">Add new Subject Teacher</div>
                            <select class="form-select  mr-sm-2" name="subject_id">
                                {{-- @foreach ($subjects as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->subject_code.' > '.$item->descriptive_title }}</option>
                                @endforeach --}}
                            </select>
                            <select class="form-select  mr-sm-2" name="teacher_id" required>
                                <option value="">Choose subject Teacher...</option>
                                @foreach ($teachers as $item)
                                <option value="{{ $item->id }}">{{ $item->teacher_name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-block btn-primary assignBtn  mr-sm-2 " type="submit">Save</button>
                            <button class="btn btn-block btn-warning cancelNow  mr-sm-2" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-table-bordered">
                    <thead>
                        <tr>
                            <th>Subject Code</th>
                            <th>Descriptive Title</th>
                            <th>Teacher</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableAssign"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('teacher/assign.shs.js') }}"></script>
{{-- <script src="{{ asset('teacher/showAssign.shs.js') }}"></script> --}}
@endsection