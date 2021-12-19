@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')
@include('administrator/management/partial/deleteModal')
{{-- <section class="section"> --}}
    {{-- <div class="section-body"> --}}
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;Manage Grade Level Chairman</p>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Manage Chairman</p>
                        </div>
                        <div class="card-body">
                            <form id="chairmanForm">@csrf
                                <input type="hidden" name="id">
                                <div class="row mb-2">
                                    <div class="col-md-5 col-12 mb-2">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Add Chairman</label>
                                            <select class="form-select" id="inputGroupSelect01"  name="grade_level" required>
                                                <option value="">Choose Grade Level</option>
                                                <option value="7">Grade 7</option>
                                                <option value="8">Grade 8</option>
                                                <option value="9">Grade 9</option>
                                                <option value="10">Grade 10</option>
                                                <option value="11">Grade 11</option>
                                                <option value="12">Grade 12</option>
                                            </select>
                                            <select class="form-select" id="mySelect2" name="teacher_id">
                                                <option value="">Choose Teacher</option>
                                                @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">
                                                    {{ $teacher->teacher_lastname.', '.$teacher->teacher_firstname.' '.$teacher->teacher_middlename }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <button class="btn btn-primary btnSavechairman" id="button-addon2" name="btnExport" type="submit">Add</button>
                                            <button class="btn btn-warning cancelchairman" id="button-addon2" name="btnExport" type="submit">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-striped" style="font-size: 15px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Grade Level</th>
                                            <th>Chairman</th>
                                            <th width="10%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="chairmanTable">
                                        <tr>
                                            <td colspan="6" class="text-center">No available data</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- col-lg-8 -->
            </div><!-- row -->
        </div>
    {{-- </div><!-- section-body --> --}}
{{-- </section> --}}
@endsection

@section('moreJs')
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('administrator/management/chairman.js') }}"></script>
@endsection