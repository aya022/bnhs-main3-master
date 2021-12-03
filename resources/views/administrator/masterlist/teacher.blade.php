@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
@include('administrator/masterlist/partial/teacherFormModal')
@include('administrator/masterlist/partial/teacherDeleteModal')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between" style="margin-bottom: -20px;">
                    <div class="col-lg-5 col-md-8">
                        <p style="font-size: 25px;"><i class="fas fa-user-cog text-dark"></i>&nbsp;&nbsp;Teacher Masterlist</p>
                    </div>
                    <div class="col-lg-4 col-md-4" style="text-align: right">
                        <!-- Button trigger modal -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn float-right btn-primary my-4"  id="btnMidalTeacher" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">
                                <i class="fas fa-plus-circle"></i>&nbsp;Add Teacher
                            </button>
                            <button class="btn float-right btn-info text-white my-4"  id="printTeacher" data-coreui-toggle="modal">
                                <i class="fas fa-print"></i>&nbsp;Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-2">
                        <div class="table-responsive">
                            <table class="table table-striped" id="teacherTable"  style="font-size: 13px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fullname</th>
                                        <th>Gender</th>
                                        <th>Username</th>
                                        {{-- <th>Password</th> --}}
                                        <th class="text-center" width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
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
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('administrator/masterlist/teacher.js') }}"></script>
@endsection