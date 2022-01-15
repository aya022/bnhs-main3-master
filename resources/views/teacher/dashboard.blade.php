@extends('../layout/app')
@section('content')

<div class="container-fluid">
    <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark" style="margin-top: -10px;">
        <p style="font-size: 25px;"><i class="fas fa-desktop"></i>&nbsp;&nbsp;Dashboard</p>
        <p>Active Academic Year:{{ empty($activeAY)?'No active academic year': ' S/Y '.$activeAY->from.'-'.$activeAY->to }}</p>
    </div>
    
    @if ( Auth::user()->chairman()->where('school_year_id', session('sessionAY')->id)->exists())
    <div class="row" style="margin-top: -10px;">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                <div class="callout-icon  ">
                    <i class="fas fa-user-edit icon-color text-info" style="font-size: 30px"></i>
                </div>
                <div class="callout-wrap">
                    <div class="callout-header">
                        <p style="font-size: 20px;">No. of Enrollee</p>
                    </div>
                    <div class="callout-body">
                        <b>{{ $enrollTotal }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                <div class="callout-icon">
                    <i class="fas fa-user icon-color text-info" style="font-size: 30px"></i>
                </div>
                <div class="callout-wrap">
                    <div class="callout-header">
                        <p style="font-size: 20px;">No. of Enrolled Student</p>
                    </div>
                    <div class="callout-body">
                        <b>{{ $studentTotal }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                <div class="callout-icon">
                    <i class="fas fa-users icon-color text-info" style="font-size:30px"></i>
                </div>
                <div class="callout-wrap">
                    <div class="callout-header">
                        <p style="font-size: 20px;">No. of Teacher</p>
                    </div>
                    <div class="callout-body">
                        <b>{{ $teacherTotal }}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="callout callout-info border-top-0 border-bottom-0 border-end-0 elevation-2 bg-white dark:bg-dark">
                <div class="callout-icon">
                    <i class="fas fa-copy icon-color text-info" style="font-size: 30px;"></i>
                </div>
                <div class="callout-wrap">
                    <div class="callout-header">
                        <p style="font-size: 20px;">No. of Section</p>
                    </div>
                    <div class="callout-body">
                        <b>{{ $ectionTotal }}</b>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- -->

    <div class="row dashMonitor"></div>
    @else
    <div class="card mb-3 shadow">
        <div class="card-body">
            <h2>Welcome, {{ Auth::user()->fullname }}!</h2>
            <p class="lead">You almost arrived, complete the information about your account.</p>
            <div class="mt-4">
                <a href="{{ route('teacher.profile') }}" class="btn btn-outline-white btn-lg btn-icon icon-left">
                    <i class="far fa-user text-info" style="font-size: 25px;"></i>&nbsp;&nbsp; Setup Profile</a>
            </div>
        </div>
    </div>
    @endif


    {{-- <h2 class="section-title">Annoucement </h2>
    <div class="row">
        @foreach ($post as $item)
            @foreach ($item->visible_by as $value)
                @if ($value==1)
                <div class="col-lg-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4> {{$item->headline}}</h4>
                    </div>
                    <div class="card-body">
                            <p><i class="fa fa-clock"></i> {{ $item->created_at->diffForHumans() }}</p>
                        @php echo html_entity_decode($item->content_body) @endphp
                    </div>
                </div>
                </div>
                @endif
                @if ($value==2)
                <div class="col-lg-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4> {{$item->headline}}</h4>
                    </div>
                    <div class="card-body">
                            <p><i class="fa fa-clock"></i> {{ $item->created_at->diffForHumans() }}</p>
                        @php echo html_entity_decode($item->content_body) @endphp
                    </div>
                </div>
                </div>
                @endif
                @if (Auth::user()->chairman()->where('school_year_id', $activeAY->id)->exists())
                @if ($value==3)
                <div class="col-lg-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h4> {{$item->headline}}</h4>
                    </div>
                    <div class="card-body">
                        <p><i class="fa fa-clock"></i> {{ $item->created_at->diffForHumans() }}</p>
                        @php echo html_entity_decode($item->content_body) @endphp
                    </div>
                </div>
                </div>
                @endif
                @endif
            @endforeach
        @endforeach
    </div> --}}
    <hr>
    <div class="row">
        <div class="col-lg-6 mb-3">
            @if ($sectionAvail->count()!=0)
            <p style="font-size: 25px;">My Load Section</p>
            @endif
            <div class="row">
                @foreach ($sectionAvail as $item)
                <div class="col-lg-4 col-md-4">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>{{ $item->section_name }}</h4>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('teacher.grading') }}" class="btn btn-info text-white btn-block"><i class="fas fa-eye"></i> View Student</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div><!-- col-lg-6 -->
    </div>
</div>

@endsection
@section('moreJs')
@if (Auth::user()->chairman()->where('school_year_id', session('sessionAY')->id)->exists())
@if (Auth::user()->chairman->grade_level>10)
<script src="{{ asset('teacher/chairman/dashMonitor.shs.js') }}"></script>
@else
<script src="{{ asset('teacher/chairman/dashMonitor.js') }}"></script>
@endif
@endif
@endsection