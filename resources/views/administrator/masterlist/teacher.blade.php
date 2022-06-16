@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')
@include('administrator/masterlist/partial/teacherFormModal')
@include('administrator/masterlist/partial/teacherDeleteModal')
@include('administrator/masterlist/partial/resetTeacherPass')
{{-- <section class="section"> --}}
    {{-- <div class="section-body"> --}}
        <form id="importForm" method="POST">@csrf
            <div class="modal fade" id="importModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="importModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importModalLabel">Import</h5>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pb-1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <button class="btn btn-outline-secondary" type="button" id="button-addon1">Excel Format</button>
                                </div>
                                {{-- <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="inputGroupFile02" required>
                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div> --}}
                                <div class="mb-3">
                                    <input class="form-control" type="file" id="inputGroupFile02" name="file" accept=".xlsx, .xlsm, .xlsb, .xls, .xltx, .xltm, .xlt, .xml, .csv"   onchange="validate_fileupload(this.value);" required>
                                </div>
                            </div>
                            <p>
                                Download excel file format <a target="_blank" href="{{ route('admin.download.template.teacher') }}">here</a>
                            </p>
                        </div>
                        <div class="modal-footer p-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btnImportNow">Import</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between" style="margin-bottom: -20px;">
                    <div class="col-lg-5 col-md-8">
                        <p style="font-size: 25px;"><i class="fas fa-user-cog text-dark"></i>&nbsp;&nbsp;Teacher Masterlist</p>
                    </div>
                    <div class="col-lg-4 col-md-4" style="text-align: right">
                        <!-- Button trigger modal -->
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn float-right btn-info text-white my-4"  id="btnMidalTeacher" data-coreui-toggle="modal" data-coreui-target="#staticBackdrop">
                                <i class="fas fa-plus-circle"></i>&nbsp;Add
                            </button>
                            {{-- <button class="btn float-right btn-success text-white my-4" id="btnModalExport" data-coreui-toggle="modal">
                                <i class="fas fa-file-export"></i>&nbsp;Import Excel
                            </button> --}}
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
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
{{-- </section> --}}

@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('administrator/masterlist/teacher.js') }}"></script>
<script>
    let  validate_fileupload =(fileName)=>
    {
    var allowed_extensions = new Array("xlsx", "xlsm", "xlsb", "xls", "xltx", "xltm", "xlt", "xml", "csv");
    var file_extension = fileName.split('.').pop().toLowerCase(); // split function will split the filename by dot(.), and pop function will pop the last element from the array which will give you the extension as well. If there will be no extension then it will return the filename.

    for(var i = 0; i <= allowed_extensions.length; i++)
    {
        if(allowed_extensions[i]==file_extension)
        {
            return true; // valid file extension
        }
    }
    getToast("warning", "Warning", 'File was not accepted');
    $(this).val(null);
}
</script>
@endsection