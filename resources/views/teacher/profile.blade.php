@extends('../layout/app')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="container-fluid">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
                <p style="font-size: 25px;"><i class="far fa-address-card"></i>&nbsp;&nbsp;My Profile</p>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Manage Profile</p>
                        </div>
                        <form id="studentForm">@csrf
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 form-group mb-3">
                                        <label for="exampleInputEmail1" class="mb-2">Employee ID</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ auth()->user()->roll_no }}" readonly>
                                    </div>
                                    <div class="col-6 form-group mb-3">
                                        <label for="exampleInputEmail1" class="mb-2">First name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ auth()->user()->teacher_firstname }}" readonly>
                                    </div>
                                    <div class="col-6 form-group mb-3">
                                        <label for="exampleInputEmail1" class="mb-2">Middle name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ auth()->user()->teacher_middlename }}" readonly>
                                    </div>
                                    <div class="col-6 form-group mb-3">
                                        <label for="exampleInputEmail1" class="mb-2">Last name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ auth()->user()->teacher_lastname }}" readonly>
                                    </div>
                                </div>
                                {{-- <button type="submit" class="btn btn-primary" disabled>Update Profile</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <p style="font-size: 20px;">Username and Password</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('teacher.profile.account') }}" method="POST">@csrf
                                {{-- <div class="form-group mb-3">
                                    <span class="alert alert-success" name="mess">{{ $message }}</span>
                                </div> --}}
                                <div class="form-group mb-3">
                                    <label class="mb-2">Username</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->username }}" name="username">
                                    @error('username') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control" name="password">
                                    @error('password') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password">
                                    @error('confirm_password') <span class="text-danger"><b>{{ $message }}</b></span> @enderror
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('moreJs')
{{-- <script src="{{ asset('student/profile.js') }}"></script> --}}
@endsection