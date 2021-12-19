<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item {{ request()->is('student/my/dashboard')?'active':'' }}"><a class="nav-link" href="{{ route('student.dashboard') }}">
                <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a>
        </li>
        @if (Auth::user()->completer==="No")
        <li class="nav-item {{ request()->is('student/my/grade')?'active':'' }}"><a class="nav-link" href="{{ route('student.grade') }}">
                <i class="far fa-edit nav-icon"></i> Grade</a>
        </li>
        @else
        <li class="nav-item {{ request()->is('student/my/grade')?'active':'' }}"><a class="nav-link" href="{{ route('student.shs.grade') }}">
                <i class="far fa-edit nav-icon"></i> Grade</a>
        </li>
        @endif
        @if (Auth::user()->backsubject()->exists())
        <li class="nav-item {{ request()->is('student/my/backsubject')?'active':'' }}"><a class="nav-link" href="{{ route('student.backsubject') }}">
                <i class="far fa-bookmark nav-icon"></i>
                <span>Back Subject
                @if(Auth::user()->backsubject()->where('back_subjects.remarks','none')->get()->count()!=0)
                        <small class="badge bg-danger badge-sm" style="font-size: 10px">
                        {{ Auth::user()->backsubject()->where('back_subjects.remarks','none')->get()->count() }}
                        </small>
                @endif
        </span></a>
        </li>
        @endif
        @if (Auth::user()->completer==="No") 
        <li class="nav-item {{ request()->is('student/my/enrollment')?'active':'' }}"><a class="nav-link" href="{{ route('student.enrollment') }}">
                <i class="fas fa-newspaper nav-icon"></i> Enrollment Status</a>
        </li>
        @else
        <li class="nav-item {{ request()->is('student/my/enrollment')?'active':'' }}"><a class="nav-link" href="{{ route('student.shs.enrollment') }}">
                <i class="fas fa-newspaper nav-icon"></i> Enrollment Status</a>
        </li>
        @endif
        <li class="nav-item {{ request()->is('student/my/profile')?'active':'' }}"><a class="nav-link" href="{{ route('student.profile') }}">
                <i class="far fa-user nav-icon"></i> Profile</a>
        </li>
        {{-- <li class="nav-title">Report</li>
        <li class="nav-item {{ request()->is('student/my/report')?'active':'' }}"><a class="nav-link" href="{{ route('student.report') }}">
                <i class="fas fa-bug nav-icon"></i>Report Problem</a>
        </li> --}}
        <li class="nav-item">
                <a class="nav-link" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt text-danger nav-icon"></i>Logout
                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none"> @csrf </form>
                </a>
        </li>
</ul>