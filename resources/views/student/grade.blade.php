@extends('../layout/app')
@section('content')

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-8">
                <p style="font-size: 25px;"><i class="far fa-address-card"></i>&nbsp;&nbsp;&nbsp;My Grade</p>
            </div>
            <div class="col-lg-2 col-md-2 my-4 float-right">
                {{-- <div class="float-right "> --}}
                    <form class="form-inline ">
                        <select name="filterGradeLevel" class="form-select my-1 mr-sm-2" id="filterLabel">
                        </select>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <p style="font-size: 25px;">Section: <span style="font-size: 15px" class="txtSectionName badge bg-info pt-1 pb-1"></span></p>
        </div>
        <div class="card-body pb-1">
            <div class="">
                <div class="float-left">
                    <span style="font-size: 15px" class="txtSubjectName badge bg-warning pt-1 pb-1 mt-2"></span>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myClassTable" style="font-size: 16px">
                        <thead class="bg-dark ">
                            <tr>
                                <th class="text-white">Teacher</th>
                                <th class="text-white">Subjects</th>
                                <th class="text-center text-white " width="8%">1st</th>
                                <th class="text-center text-white " width="8%">2nd</th>
                                <th class="text-center text-white " width="8%">3rd</th>
                                <th class="text-center text-white " width="8%">4th</th>
                                <th class="text-center text-white " width="8%">Avg</th>
                                <th class="text-center text-white " width="8%">Remarks</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tbody id="gradeTable">
                            <tr>
                                <td colspan="8" class="text-center text-black">No subjects available</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr class="bg-dark">
                                <td colspan="6" class="text-right text-white"><b>Final Average</b></td>
                                <td id="overallGrade" class="text-center text-white "></td>
                                <td id="overallRemark" class="text-center text-white "></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <section class="section">
    <div class="section-body">
        <div class="col-12">
            <div class="row justify-content-between">
                <div class="col-lg-5 col-md-8">
                    <h2 class="section-title">My Grade&nbsp;&nbsp;&nbsp;<span style="font-size: 15px"
                            class="txtSectionName badge badge-warning pt-1 pb-1"></span></h2>
                </div>
                <div class="col-lg-2 col-md-2 my-4">
                    <div class="float-right ">

                        <form class="form-inline ">
                            <select name="filterGradeLevel" class="custom-select my-1 mr-sm-2" id="filterLabel">
                            </select>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-body pb-1">
                    <div class="">
                        <div class="float-left">
                            <span style="font-size: 15px"
                                class="txtSubjectName badge badge-warning pt-1 pb-1 mt-2"></span>
                        </div>
                        <table class="table  table-bordered table-hover" id="myClassTable" style="font-size: 14px">
                            <thead class="bg-info ">
                                <tr>
                                    <th class="text-white">Teacher</th>
                                    <th class="text-white">Subjects</th>
                                    <th class="text-center text-white " width="8%">1st</th>
                                    <th class="text-center text-white " width="8%">2nd</th>
                                    <th class="text-center text-white " width="8%">3rd</th>
                                    <th class="text-center text-white " width="8%">4th</th>
                                    <th class="text-center text-white " width="8%">Avg</th>
                                    <th class="text-center text-white " width="8%">Remarks</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tbody id="gradeTable">
                                <tr>
                                    <td colspan="8" class="text-center text-black">No subjects available</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="bg-info">
                                    <td colspan="6" class="text-right text-white"><b>Final Average</b></td>
                                    <td id="overallGrade" class="text-center text-white "></td>
                                    <td id="overallRemark" class="text-center text-white "></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection
@section('moreJs')
<script src="{{ asset('student/grade.js') }}"></script>
@endsection