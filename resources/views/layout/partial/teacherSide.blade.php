<!-- -->
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item {{ request()->is('teacher/my/dashboard')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.dashboard') }}">
        <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a>
    </li>
    @if (Auth::user()->assign->count()>0)
        <?php
            $countjhs=0;
            $countshs=0;
            ?>
        @foreach (Auth::user()->assign_info as $item)
        <?php ($item->grade_level<11)? $countjhs+=1: $countshs+=1; ?>
        @endforeach
        @if (Auth::user()->assign()->where('school_year_id',$activeAY->id)->exists())
            <li class="nav-title">Grading Section</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <i class="far fa-edit nav-icon"></i>Grading</a>
                <ul class="nav-group-items">
                @if ($countjhs!=0)
                    <li class="nav-item {{ request()->is('teacher/my/grading')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.grading') }}"><i class="nav-icon fas fa-user-edit"></i>Junior High</a>
                    </li>
                @endif
                @if ($countshs!=0)
                    <li class="nav-item {{ request()->is('teacher/my/grading/shs')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.grading.shs') }}"><i class="nav-icon fas fa-user-edit"></i>Senior High</a>
                    </li>
                @endif
                </ul>
            </li>
        @endif
    @endif
    
    
    <!-- -->
    <li class="nav-title">Management</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="far fa-folder-open nav-icon"></i>Management</a>
        <ul class="nav-group-items">
        @if (Auth::user()->section()->where('school_year_id', $activeAY->id)->exists())
            @if (Auth::user()->section->grade_level<=10)
                <li class="nav-item {{ request()->is('teacher/my/class/monitor')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.monitor') }}"><i class="nav-icon fas fa-chalkboard-teacher"></i>Class Monitor</a>
                </li>
                {{-- <li class="nav-item {{ request()->is('teacher/my/assign')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.assign') }}"><span class="nav-icon far fa-id-badge"></span>Assign JH Subject</a>
                </li> --}}
            @elseif (Auth::user()->section->grade_level>10)
                <li class="nav-item {{ request()->is('teacher/my/senior/class/monitor')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.senior.monitor') }}"><span class="nav-icon fas fa-chalkboard-teacher"></span>Class Monitor</a>
                </li>
                {{-- <li class="nav-item {{ request()->is('teacher/my/senior/assign')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.senior.assign') }}"><span class="nav-icon far fa-id-badge"></span>Assign SHS Subject</a>
                </li> --}}
            @endif
        @endif
        </ul>
    </li>
    
    <!-- -->
    @if (Auth::user()->chairman()->where('school_year_id', $activeAY->id)->exists())
        @if (Auth::user()->chairman_info->grade_level>=11)
            <li class="nav-title">Chairman Management</li>
            <li class="nav-item {{ request()->is('teacher/my/senior/section')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.senior.section') }}">
                <i class="fas fa-tachometer-alt nav-icon"></i> Manage Section</a>
            </li>
            <li class="nav-item {{ request()->is('teacher/my/senior/enrollee')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.senior.enrollee.page') }}">
                <i class="far fa-calendar-check nav-icon"></i>Enroll Student</a>
            </li>
            <li class="nav-item {{ request()->is('teacher/my/senior/assign')?'active':'' }}">
                <a class="nav-link" href="{{ route('teacher.class.senior.assign') }}"><span class="nav-icon far fa-id-badge"></span>Assign SHS Subject</a>
            </li>
            @else
            <li class="nav-title">Chairman Management</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                <i class="fas fa-cogs nav-icon"></i>Chairman Options</a>
                <ul class="nav-group-items">
                    {{-- <li class="nav-item {{ request()->is('teacher/my/stem')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.stem') }}"><span class="nav-icon fab fa-black-tie"></span>STEM</a>
                    </li> --}}
                    <li class="nav-item {{ request()->is('teacher/my/bec')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.bec') }}"><i class="nav-icon fab fa-audible"></i></span>BEC</a>
                    </li>
                    <li class="nav-item {{ request()->is('teacher/my/assign')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.class.assign') }}"><span class="nav-icon far fa-id-badge"></span>Assign Subject</a>
                    </li>
                    {{-- <li class="nav-item {{ request()->is('teacher/my/spa')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.spa') }}"><span class="nav-icon fas fa-users-cog"></span>SP Art</a>
                    </li>
                    <li class="nav-item {{ request()->is('teacher/my/spj')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.spj') }}"><span class="nav-icon fas fa-users-cog"></span>SP Journalism</a>
                    </li> --}}
                </ul>
            </li>

        @endif
        {{-- <li class="{{ request()->is('teacher/my/certificate')?'active':'' }}">
            <a class="nav-link" href="{{ route('teacher.certificate') }}">
                <i class="fas fa-certificate"></i><span>Certificate</span>
            </a>
        </li> --}}
        {{-- <li class="nav-item {{ request()->is('teacher/my/certificate')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.certificate') }}">
            <i class="fas fa-certificate nav-icon"></i><span>Certificate</a>
        </li> --}}
    @endif
    <li class="nav-item {{ request()->is('teacher/my/profile')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.profile') }}">
        <i class="nav-icon fab fa-artstation"></i>Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt text-danger nav-icon"></i>Logout
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </li>
</ul>