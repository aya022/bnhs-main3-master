@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('teacher/partial/assignDeleteModal')
<section class="section">
    <input type="hidden" name="current_curriculum" value="BEC">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-bookmark"></i>&nbsp;&nbsp;Assign Subject</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row sectionListAvailable mb-3"></div>
                    <div class="card card-info">
                        <div class="card-header">
                            <p style=""></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5 col-md-5 col-sm-12 mb-3">
                                    <form id="assignForm">@csrf
                                        <input type="hidden" name="id">
                                        <div class="row mb-3">
                                            <div class="col-mb-2">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">Assign Subject Teacher</span>
                                                    <select class="form-select" aria-label="Default select example" name="subject_id">
                                                        <option value="">Choose subject</option>
                                                        @foreach ($subjects as $item)
                                                        <option value="{{ $item->id }}">[ {{ $item->subject_code }} ] -
                                                            {{ $item->descriptive_title }}</option>
                                                        @endforeach
                                                    </select>
                                                    <select class="form-select" aria-label="Default select example" name="teacher_id">
                                                        <option value="">Choose subject teacher</option>
                                                        @foreach ($teachers as $item)
                                                        <option value="{{ $item->id }}">{{ $item->teacher_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button class="btn btn-primary pl-4 pr-4 assignBtn rounded" type="submit">Save</button>
                                                    <button class="btn btn-warning pl-4 pr-4 cancelNow rounded" type="submit">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="section_id" value="{{  Auth::user()->section_info->id }}">
                                        <input type="hidden" name="grade_level"
                                            value="{{  Auth::user()->section_info->grade_level }}">
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Subject Teacher</th>
                                            <th width="13%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableAssign">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- section-body -->
</section>
@endsection

@section('moreJs')
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('teacher/assign.js') }}"></script>
@endsection