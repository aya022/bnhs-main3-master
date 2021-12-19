<!-- -->
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-item {{ request()->is('admin/my/dashboard')?'active':'' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt nav-icon"></i> Dashboard</a>
    </li>
    {{-- <li class="nav-title">TRANSACTION</li> --}}
    {{-- <li class="nav-item"><a class="nav-link" href="#">
        <i class="fas fa-bullhorn nav-icon"></i> Blog</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="#">
        <i class="far fa-newspaper nav-icon"></i> Announcement</a>
    </li> --}}
    <li class="nav-item {{ request()->is('admin/my/appointment')?'active':'' }}"><a class="nav-link" href="{{ route('admin.appointment') }}">
        <i class="far fa-calendar-check nav-icon"></i> Appointment</a>
    </li>
    {{-- <li class="nav-title">LIST</li> --}}
    <li class="nav-item {{ request()->is('admin/my/enrollment')?'active':'' }}"><a class="nav-link" href="{{ route('admin.enrollment') }}">
        <i class="far fa-address-card nav-icon"></i> Enrollee</a>
    </li>
    
    <!-- -->
    <li class="nav-title">Management Section</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="fas fa-clipboard-list nav-icon"></i>Management</a>
        <ul class="nav-group-items">
            <li class="nav-item {{ request()->is('admin/my/chairman')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.chairman') }}"><span class="nav-icon fas fa-chalkboard-teacher"></span>Assign Chairman</a>
            </li>
            <li class="nav-item {{ request()->is('admin/my/subject')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.subject') }}"><span class="nav-icon far fa-file-alt"></span>Manage Subject</a>
            </li>
            <li class="nav-item {{ request()->is('admin/my/assign')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.assign') }}"><span class="nav-icon far fa-bookmark"></span>Assign Subject Teacher</a>
            </li>
            <li class="nav-item {{ request()->is('admin/my/section')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.section') }}"><i class="nav-icon fab fa-black-tie"></i>Section and Adviser</a>  
            </li>
            {{-- <li class="nav-item {{ request()->is('admin/my/schedule')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.schedule') }}"><i class="nav-icon fas fa-calendar-alt"></i><span>Schedule</span></a>
            </li> --}}
            <li class="nav-item {{ request()->is('admin/my/strand')?'active':'' }}">
                <a class="nav-link" href="{{ route('admin.strand') }}"><span class="nav-icon fas fa-server"></span> SHS Track &amp; Strand</a>
            </li>
            
            {{-- <li class="{{ request()->is('admin/my/schedule')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.schedule') }}">
        <i class="fas fa-calendar-alt"></i><span>Schedule</span></a>
    </li> --}}
        </ul>
    </li>

    <!-- -->
    <li class="nav-title">Masterlist</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="far fa-folder-open nav-icon"></i>Masterlist</a>
        <ul class="nav-group-items">
        <li class="nav-item {{ request()->is('admin/my/teacher')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.teacher') }}"><span class="nav-icon fas fa-id-card"></span> Teacher</a>
        </li>
        <li class="nav-item {{ request()->is('admin/my/student')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.student') }}"><span class="nav-icon far fa-id-badge"></span> Student</a>
        </li>
        <li class="nav-item {{ request()->is('admin/my/archive')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.archive') }}"><span class="nav-icon fas fa-folder-open"></span> Archive</a>
        </li>
        <li class="nav-item {{ request()->is('admin/my/backrecord')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.backrecord') }}"><span class="nav-icon fas fa-undo"></span> Back Subject</a>
        </li>
        </ul>
    </li>

    <!-- -->
    <li class="nav-title">Settings</li>
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <i class="fas fa-cogs nav-icon"></i>Settings</a>
        <ul class="nav-group-items">
        <li class="nav-item {{ request()->is('admin/my/profile')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.profile') }}"><span class="nav-icon fab fa-black-tie"></span> School Profile</a>
        </li>
        <li class="nav-item {{ request()->is('admin/my/academic-year')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.academicYear') }}"><span class="nav-icon far fa-calendar-alt"></span> Academic Year</a>
        </li>
        <li class="nav-item {{ request()->is('admin/my/user')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.user') }}"><span class="nav-icon fas fa-users-cog"></span> Manage Profile</a>
        </li>
        </ul>
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