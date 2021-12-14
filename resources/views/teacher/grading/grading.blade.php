@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<style>
    .failGrade {
        color: red;
    }

    .noborder {
        width: 95%;
        border: none;
        border-color: transparent;
        background: transparent;
        outline: none;
    }
</style>
@endsection
@section('content')
@include('teacher/grading/partial/importModal')
<div class="modal fade" id="fillGradeInPrevious" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="fillGradeInPreviousLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <p class="mt-3">Please fill previous grading period</p>
                <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="fas fa-pen"></i>&nbsp;&nbsp;Grading [ <span style="font-size: 15px" class="txtSubjectName badge bg-warning pt-1 pb-1 mt-2"></span> ]</p>
                <div class="float-left">
                    
                </div>
                <div class="col-lg-4 float-left">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="text-white btn btn-sm btn-info pl-3 pr-3" id="btnImport">
                            <i class="fas fa-cloud-upload-alt"></i>&nbsp;Import
                        </button>
                        <button type="button" class="text-white btn btn-sm btn-dark btnDownload">
                            <i class="fas fa-cloud-download-alt"></i>Template
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 my-4">
                <div class="input-group">
                    <div class="input-group-text" id="btnGroupAddon">Filter:</div>
                    <select name="filterMyLoadSection" class="form-select" id="filterLabel">
                    </select>
                    <div class="input-group-append"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-info">
        <div class="card-body pb-1">
            <div class="table responsive">
                <table class="table  table-bordered table-hover" id="myClassTable" style="font-size: 14px">
                    <thead class="bg-dark ">
                        <tr>
                            <th class="text-white">Student name</th>
                            <th class="text-center text-white" width="7%">1st</th>
                            <th class="text-center text-white" width="7%">2nd</th>
                            <th class="text-center text-white" width="7%">3rd</th>
                            <th class="text-center text-white" width="7%">4th</th>
                            <th class="text-center text-white" width="7%">Avg</th>
                            <th class="text-center text-white" width="8%">Remarks</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('teacher/grading.js') }}"></script>
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