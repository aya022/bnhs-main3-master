<!-- -->
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item {{ request()->is('teacher/my/dashboard')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.dashboard') }}">
        <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a>
    </li>
    @if (Auth::user()->section()->where('school_year_id', $activeAY->id)->exists())
        @if (Auth::user()->section()->where('school_year_id', $activeAY->id)->first()->grade_level<=10) 
            <li class="nav-title">Adviser Setting</li>
            <li class="nav-item {{ request()->is('teacher/my/class/monitor')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.class.monitor') }}">
                <i class="fas fa-puzzle-piece nav-icon"></i> Class Monitor</a>
            </li><!-- -->
            <li class="nav-item {{ request()->is('teacher/my/assign')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.class.assign') }}">
                <i class="fas fa-handshake nav-icon"></i>Assign Subject</a>
            </li><!-- -->
            @else
            <li class="nav-title">Adviser Setting</li>
            <li class="nav-item {{ request()->is('teacher/my/senior/class/monitor')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.class.senior.monitor') }}">
                <i class="fas fa-puzzle-piece nav-icon"></i> Class Monitor</a>
            </li><!-- -->
            <li class="nav-item {{ request()->is('teacher/my/senior/assign')?'active':'' }}"><a class="nav-link" href="{{ route('teacher.class.senior.assign') }}">
                <i class="fas fa-handshake nav-icon"></i>Assign Subject</a>
            </li><!-- -->
        @endif
    @endif

    @if (Auth::user()->assign->count()>0 || Auth::user()->newassign->count()>0)

    <?php
        $countjhs=0;
        $countshs=0;
        ?>
    @foreach (Auth::user()->assign_info as $item)
    <?php ($item->grade_level<11)? $countjhs+=1: $countshs+=1; ?>
    @endforeach
    <li class="nav-title">Grading Section</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="far fa-edit nav-icon"></i>Grading</a>
        @if (Auth::user()->assign()->where('school_year_id',$activeAY->id)->exists())
        <ul class="nav-group-items">
            @if ($countjhs!=0)
            <li class="nav-item {{ request()->is('teacher/my/grading')?'active':'' }}">
                <a class="nav-link" href="{{ route('teacher.grading') }}"><i class="nav-icon fas fa-user-friends"></i>Junior High</a>
            </li>
            @endif
        </ul>
        @endif

        @php
            $countss= DB::table('newassigns')
            ->join('sections','newassigns.section_id','sections.id')
            ->where('newassigns.teacher_id',auth()->user()->id)
            ->where('sections.school_year_id',$activeAY->id)
            ->count();
        @endphp

        @if ($countss>0)
        <ul class="nav-group-items">
            <li class="nav-item {{ request()->is('teacher/my/grading/shs')?'active':'' }}">
                <a class="nav-link" href="{{ route('teacher.grading.shs') }}">
                    <i class="nav-icon fas fa-user-clock"></i><span>Senior High</span>
                </a>
            </li>
        </ul>
        @endif
    </li>
    @endif

    <!-- End here -->

    {{-- @if (Auth::user()->assign->count()>0)
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
    @endif --}}
    
    <!-- -->

    @if (Auth::user()->chairman()->where('school_year_id', $activeAY->id)->exists())
        @if (Auth::user()->chairman_info->grade_level>=11) 
        <li class="nav-title">Chairman Setting</li>
        <li class="nav-item {{ request()->is('teacher/my/senior/section')?'active':'' }}">
            <a class="nav-link" href="{{ route('teacher.senior.section') }}">
                <i class="fas fa-scroll nav-icon"></i>Manage Section
            </a>
        </li><!-- -->
        {{-- <li class="{{ request()->is('teacher/my/senior/section')?'active':'' }}"><a class="nav-link"
                href="{{ route('teacher.senior.section') }}"><i class="fas fa-border-all"></i><span>Manage
                    Section</span></a>
        </li> --}}
        <li class="nav-item {{ request()->is('teacher/my/senior/enrollee')?'active':'' }}">
            <a class="nav-link" href="{{ route('teacher.senior.enrollee.page') }}">
                <i class="fas fa-users nav-icon"></i><span>Enroll Student</span>
            </a>
        </li>
        @else
        <li class="nav-title">Chairman Setting</li>
        <li class="nav-item {{ request()->is('teacher/my/section')?'active':'' }}">
            <a class="nav-link" href="{{ route('teacher.section') }}">
                <i class="fas fa-scroll nav-icon"></i><span>Manage Section</span>
            </a>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <i class="far fa-edit nav-icon"></i>Enroll Student</a>
        {{-- <li class="nav-item dropdown {{ request()->is('teacher/my/stem') || request()->is('teacher/my/bec') || request()->is('teacher/my/spa') || request()->is('teacher/my/spj')?'active':'' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                <i class="fas fa-users"></i><span>Enroll Student</span>
            </a> --}}
            <ul class="nav-group-items">
                {{-- <li class="nav-item {{ request()->is('teacher/my/stem')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.stem') }}"><i class="nav-icon fas fa-atom"></i>STEM</a>
                </li> --}}
                <li class="nav-item {{ request()->is('teacher/my/bec')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.bec') }}"><i class="nav-icon fas fa-atom"></i>BEC</a>
                </li>
                {{-- <li class="{{ request()->is('teacher/my/bec')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.bec') }}">
                        <i class="fas fa-users"></i><span>BEC</span>
                    </a>
                </li>
                <li class="{{ request()->is('teacher/my/spa')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.spa') }}">
                        <i class="fas fa-palette"></i><span>SP Art</span>
                    </a>
                </li>
                <li class="{{ request()->is('teacher/my/spj')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.spj') }}">
                        <i class="fas fa-file-signature"></i><span>SP Journalism</span>
                    </a>
                </li> --}}
            </ul>
        </li>
        @endif
        <li class="{{ request()->is('teacher/my/certificate')?'active':'' }}">
            <a class="nav-link" href="{{ route('teacher.certificate') }}">
                <i class="fas fa-certificate nav-icon"></i><span>Certificate</span>
            </a>
        </li>
    @endif

    <!-- start -->
    {{-- <li class="nav-title">Management</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="far fa-folder-open nav-icon"></i>Management</a>
        <ul class="nav-group-items">
        @if (Auth::user()->section()->where('school_year_id', $activeAY->id)->exists())
            @if (Auth::user()->section->grade_level<=10)
                <li class="nav-item {{ request()->is('teacher/my/class/monitor')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.monitor') }}"><i class="nav-icon fas fa-chalkboard-teacher"></i>Class Monitor</a>
                </li>
            @elseif (Auth::user()->section->grade_level>10)
                <li class="nav-item {{ request()->is('teacher/my/senior/class/monitor')?'active':'' }}">
                    <a class="nav-link" href="{{ route('teacher.class.senior.monitor') }}"><span class="nav-icon fas fa-chalkboard-teacher"></span>Class Monitor</a>
                </li>
            @endif
        @endif
        </ul>
    </li> --}}
    
    <!-- start -->
    {{-- @if (Auth::user()->chairman()->where('school_year_id', $activeAY->id)->exists())
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
                    <li class="nav-item {{ request()->is('teacher/my/bec')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.bec') }}"><i class="nav-icon fab fa-audible"></i></span>BEC</a>
                    </li>
                    <li class="nav-item {{ request()->is('teacher/my/assign')?'active':'' }}">
                        <a class="nav-link" href="{{ route('teacher.class.assign') }}"><span class="nav-icon far fa-id-badge"></span>Assign Subject</a>
                    </li>
                </ul>
            </li>

        @endif
    @endif --}}
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