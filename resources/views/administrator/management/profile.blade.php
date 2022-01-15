@extends('../layout/app')
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

<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
</style>

@section('content')
<div class="modal fade" id="endModalOnlineENrollment" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="fillGradeInPreviousLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-top">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                {{-- <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div class="modal-body text-center">
                <p class="mt-3 showText"></p>
                <button type="button" class="btn btn-primary text-white btn-md pl-3 pr-3 btnYes">Yes</button>&nbsp;&nbsp;
                <button type="button" class="btn btn-warning text-white btn-md btnClose">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <p style="font-size: 25px;"><i class="far fa-building"></i>&nbsp;&nbsp;School Info</p>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="card shadow">
                {{-- <div class="card-header">
                    <p style="font-size: 20px;">School Profile</p>
                </div> --}}
                <div class="card-body">
                    <h5 class="card-title">Manage School Profile</h5><hr>
                    <form enctype="multipart/form-data" id="schooProfileForm">@csrf
                        <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="inputSchoolName" class="mb-2">School Name</label>
                                    <input type="text" class="form-control" name="school_name"
                                        value="{{ $data->school_name ?? '' }}" id="inputSchoolName" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="inputSchoolAddress" class="mb-2">School Address</label>
                                    <input type="text" class="form-control" name="school_address"
                                        value="{{ $data->school_address ?? '' }}" id="inputSchoolAddress" required>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="inputSchoolIdNo" class="mb-2">School Division</label>
                                        <input type="text" class="form-control" name="school_division" value="{{ $data->school_division ?? '' }}" id="inputSchoolIdNo" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="inputSchoolIdNo" class="mb-2">School Region</label>
                                        <input type="text" class="form-control" name="school_region" value="{{ $data->school_region ?? '' }}" id="inputSchoolIdNo" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="inputSchoolIdNo" class="mb-2">School ID No.</label>
                                        <input type="number" class="form-control" name="school_id_no" value="{{ $data->school_id_no ?? '' }}" id="inputSchoolIdNo" required>
                                    </div>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnSaveSP">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="row">
                @if (isset($data))
                {{-- {{empty($data->school_enrollment_url)}} --}}
                <div class="col-md-12 col-12">
                    <div class="card mb-3 shadow">
                        {{-- <div class="card-header">
                            <p style="font-size: 20px;">Grade Input Deadline</p>
                            <div class="card-header-action">
                            
                                @if ($data->grade_status)
                                <span class="badge bg-warning badgeText">
                                Disabled
                                </span>      
                                @else
                                <span class="badge bg-success badgeText">
                                    Enabled
                                </span>
                                @endif
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <h5 class="card-title">Grade Input Deadline</h5><hr>
                            <div class="row">
                                <div class="form-group col-12">
                                    <p class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle"></i> Set time and date for the grade deadline.
                                    </p>
                                    <form method="POST" id="dealineform">@csrf
                                        <div class="form-group">
                                            <label class="mb-2">Deadline</label>
                                            <input type="datetime-local" value="{{ $data->grade_deadline ?? '' }}" name="from" class="form-control" required><br>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>To</label>
                                            <input type="datetime-local" name="to" class="form-control" required><br>
                                        </div> --}}
                                        {{-- <input type="submit" name="btngrade" class="btn btn-primary"> --}}
                                        <button type="submit" id="btngrade" class="btn btn-primary">Save Changes</button>
                                    </form>
                                </div>
                                <div class="form-group col-lg-3 col-md-3 col-sm-12">
                                    {{-- <label class="custom-switch my-3 mx-0">
                                        <input type="checkbox" name="grade_status" class="form-control-lg switchMe" {{ $data->grade_status?'checked':'' }}>
                                        <span class="custom-switch-indicator"></span>
                                    </label> --}}

                                    {{-- <label class="switch">
                                        <input type="checkbox" name="grade_status" {{ $data->grade_status?'checked':'' }}>
                                        <span class="slider round"></span>
                                    </label> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3 shadow">
                        {{-- <div class="card-header">
                            <p style="font-size: 20px;">Manage Enrollment Status</p>
                        </div> --}}
                        <div class="card-body pb-0">
                            <h5 class="card-title">Manage Enrollment Status</h5><hr>
                            <form id="enrollStatusForm">@csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-text" id="btnGroupAddon"><b>Enrollment Status:</b></div>
                                    <select name="statusEnrollment" id="selectEnrollmentStatus"
                                            class="form-select" required>
                                        <option {{ empty($data->school_enrollment_url)?'selected':'' }}
                                            value="">
                                        </option>
                                        <option {{  ($data->school_enrollment_url==true)?'selected':'' }}
                                            value="yes">
                                            Ongoing
                                        </option>
                                        <option {{ ($data->school_enrollment_url==false)?'selected':'' }}
                                            value="no">
                                            Disabled
                                        </option>
                                    </select>
                                </div>

                                {{-- <div class="form-row">
                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                        <label for="selectEnrollmentStatus" class="my-2">Enrollment Status</label>
                                    </div>
                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 mb-3">
                                        <select name="statusEnrollment" id="selectEnrollmentStatus"
                                            class="form-select" required>
                                            <option {{ empty($data->school_enrollment_url)?'selected':'' }}
                                                value="">
                                            </option>
                                            <option {{  ($data->school_enrollment_url==true)?'selected':'' }}
                                                value="yes">
                                                Ongoing
                                            </option>
                                            <option {{ ($data->school_enrollment_url==false)?'selected':'' }}
                                                value="no">
                                                Disabled
                                            </option>
                                        </select>
                                    </div>
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                {{--  --}}
                {{-- <div class="col-md-12 col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-text" id="btnGroupAddon"><b>Download Database:</b></div>
                                <a href="{{ route('admin.backup.run') }}" class="btn btn-warning btn-block text-white">BACK-UPDATABASE</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        {{--  --}}
        {{-- <div class="col-lg-12">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <p style="font-size: 20px;">BACK-UP HISTORY</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>File name</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $key=1;
                                @endphp
                            @forelse ($fileRetrive as $item)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $item }}</td>
                                    <td>
                                        <a href="{{ url('admin/my/backup/donwload/'.$item) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a>
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="event.preventDefault(); document.getElementById('remove-form').submit();"><i class="fa fa-times"></i> Remove</button>
                                        <form id="remove-form" action="{{ url('admin/my/backup/remove/'.$item) }}" method="POST" >@csrf</form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

{{-- <section class="section">
    <div class="section-body">
        
    </div>
</section> --}}
@endsection
@section('moreJs')
<script src="{{ asset('js/uploadPreview/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('administrator/management/profile.js') }}"></script>
@endsection