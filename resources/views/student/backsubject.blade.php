@extends('../layout/app')
@section('content')
{{-- <section class="section"> --}}
    <div class="container-fluid">
        {{-- <h2 class="section-title">Back Subject&nbsp;&nbsp;&nbsp;<span style="font-size: 15px"
                class="txtSectionName badge bg-warning pt-1 pb-1"></span></h2> --}}
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><span class="fas fa-undo"></span>&nbsp;&nbsp; Back Subject
                &nbsp;&nbsp;&nbsp;<span style="font-size: 15px"
                class="txtSectionName badge bg-warning pt-1 pb-1"></span>
            </p>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body pb-1">
                    <div class="">
                        <div class="float-left">
                            <span style="font-size: 15px"
                                class="txtSubjectName badge bg-warning pt-1 pb-1 mt-2"></span>
                        </div>
                        {{-- table-responsive--}}
                        <table class="table  table-bordered table-hover" id="myClassTable" style="font-size: 15px">
                            <thead class="bg-dark ">
                                <tr>
                                    <th class="text-white">Subjects</th>
                                    <th class="text-center text-white">Final Rating</th>
                                    <th class="text-center text-white">Recomputed Final Grade</th>
                                    <th class="text-center text-white">Conducted From</th>
                                    <th class="text-center text-white">Conducted To</th>
                                    <th class="text-center text-white">Remarks</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tbody id="backsubjectTable">
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </section> --}}
@endsection
@section('moreJs')
<script src="{{ asset('student/backsubject.js') }}"></script>
@endsection