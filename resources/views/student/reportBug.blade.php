@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <div class="row justify-content-between">
                    <div class="col-lg-5 col-md-8">
                        <p style="font-size: 25px;"><i class="fas fa-bug"></i>&nbsp;&nbsp;Report&nbsp;&nbsp;(Something Isn't Working) <span style="font-size: 15px" class="txtSectionName badge bg-warning pt-1 pb-1"></span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Let us know about a broken feature</h5>
                    </div>
                    <div class="card-body">
                        <p>Your device and carrier information will be attached to the report.
                            Although we regularly use this data to improve the quality of the site, we do not reply to bugs
                            submitted through this form on an individual basis. </p>
                        <form action="">
                            <div class="form-group mb-3">
                                <label class="mb-2" for="">What went wrong?</label>
                                <textarea class="form-control" data-height="150" name="" id=""></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="">Attach optional screenshot</label>
                                <input type="file" name="" class="form-control">
                            </div>
                            <button class="btn btn-info" disabled>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
<script src="{{ asset('student/backsubject.js') }}"></script>
@endsection