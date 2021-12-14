@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('teacher/chairman/partial/shsDeleteSection')

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <p style="font-size: 25px;"><i class="fas fa-chalkboard-teacher"></i>&nbsp;&nbsp;Manage Section | Grade {{ auth()->user()->chairman_info->grade_level }} Chairman </p>
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
                                    <th>Strand</th>
                                    <th>Adviser</th>
                                    <th width="10%" class="text-center">Action</th>
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
                    <form id="sectionForm" autocomplete="off">@csrf
                        <input type="hidden" name="id">
                        <div class="form-group mb-3">
                            <label class="mb-3">Section / Class Name</label>
                            <input type="text" class="form-control" name="section_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-3">Class Type</label>
                            <select name="strand_id" class="form-select" required>
                                @foreach ($strands as $item)
                                <option value="{{ $item->id }}">{{ $item->strand.' - '.$item->description }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-3">Class Adviser</label>
                            <select name="teacher_id" class="form-select select2" id="mySelect2" required>
                                <option value=""></option>
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->teacher_lastname.', '.$teacher->teacher_firstname.' '.$teacher->teacher_middlename }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btnSaveSection">Submit</button>
                        <button type="submit" class="btn btn-warning cancelSection">Cancel</button>
                    </form>
                </div>
            </div>
        </div><!-- col-lg-4 -->
    </div><!-- row -->
</div>
{{-- <section class="section">
    <div class="section-body">
        <h2 class="section-title">Manage Section | Grade {{ auth()->user()->chairman_info->grade_level }} Chairman</h2>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <div class="card card-info">
                    <div class="card-body pb-1">
                        <div class="table-responsive">
                            <table class="table table-striped" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Section name</th>
                                        <th>Strand</th>
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
                <div class="card card-info">
                    <div class="card-body m-1">
                        <form id="sectionForm" autocomplete="off">@csrf
                            <input type="hidden" name="id">
                            <div class="form-group">
                                <label>Section / Class Name</label>
                                <input type="text" class="form-control" name="section_name" required>
                            </div>
                            <div class="form-group">
                                <label>Class Type</label>
                                <select name="strand_id" class="form-control" required>
                                    @foreach ($strands as $item)
                                    <option value="{{ $item->id }}">{{ $item->strand.' - '.$item->description }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Class Adviser</label>
                                <select name="teacher_id" class="form-control select2" id="mySelect2" required>
                                    <option value=""></option>
                                    @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">
                                        {{ $teacher->teacher_lastname.', '.$teacher->teacher_firstname.' '.$teacher->teacher_middlename }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btnSaveSection">Submit</button>
                            <button type="submit" class="btn btn-warning cancelSection">Cancel</button>
                        </form>
                    </div>
                </div>
            </div><!-- col-lg-4 -->
        </div><!-- row -->
    </div><!-- section-body -->
</section> --}}
@endsection

@section('moreJs')
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('teacher/chairman/section.shs.js') }}"></script>
@endsection