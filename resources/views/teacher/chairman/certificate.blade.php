@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}">
@endsection
@section('content')

{{-- <section class="section"> --}}
    <div class="container-fluid">
        <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
            <p style="font-size: 25px;"><i class="fas fa-award"></i>&nbsp;&nbsp;Certifications</p>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="card card-info">
                    <div class="card-body pb-0">
                        <div class="form-group mb-3">
                            <div class="table-responsive">
                                <table class="table table-striped" id="certificateTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                LRN
                                            </th>
                                            <th>
                                                Fullname
                                            </th>
                                            <th>
                                                Section
                                            </th>
                                            <th width="10%">
                                                Report
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- section-body -->
{{-- </section> --}}
@endsection

@section('moreJs')
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
{{-- <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script> --}}
<script src="{{ asset('teacher/chairman/certificate.js') }}"></script>
@endsection