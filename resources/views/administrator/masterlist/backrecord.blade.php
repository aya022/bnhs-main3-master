@extends('../layout/app')
@section('moreCss')
<link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/datatable/responsive.bootstrap4.min.css') }}">
@endsection
@section('content')

<!-- Modal -->
@include('administrator/masterlist/partial/viewBackSubject')
{{-- Modal end --}}

<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            {{-- <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between" style="margin-bottom: -20px;">
                    <div class="col-lg-5 col-md-8">
                        <p style="font-size: 25px;"><i class="fas fa-undo-alt text-dark"></i>&nbsp;&nbsp;Back Subject</p>
                    </div>
                </div>
            </div> --}}
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="fas fa-undo-alt text-dark"></i>&nbsp;&nbsp;Back Subject</p>
            </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body mt-2 pb-0 pt-1 mb-3">
                            <div class="table-responsive">
                                <table class="table table-striped" id="backsubjectTable">
                                    <thead>
                                        <tr>
                                            <th>LRN</th>
                                            <th>Fullname</th>
                                            <th width="15%">Action</th>
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
<script src="{{ asset('administrator/masterlist/backrecord.js') }}"></script>
@endsection