<div class="sidebar sidebar-dark sidebar-fixed sidebar-self-hiding-xl" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <img src="{{ asset('image/logo/bn.jpg') }}" alt="" class="sidebar-brand-full img-fluid rounded-circle" width="50">&nbsp;&nbsp;
        <h5 class="sidebar-brand-full" width="46" height="46">eBNHS</h5>
        <img src="{{ asset('image/logo/bn.jpg') }}" alt="" class="sidebar-brand-narrow img-fluid rounded-circle" width="46" height="46">
    </div>
    <div class="text-center mt-3">
        <p style="font-size: 11px;" class="sidebar-brand-full sidebar-brand-narrow">
            {{ empty($activeAY)?'No active academic year':'S/Y '.$activeAY->from.'-'.$activeAY->to }}
        </p>
    </div>
    
    @if (Auth::guard('web')->check())
    @include('layout/partial/adminSide')
    @elseif(Auth::guard('teacher')->check())
    @include('layout/partial/teacherSide')
    @elseif(Auth::guard('student')->check())
    @include('layout/partial/studentSide')
    @endif

    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>

<!-- Navbar -->
    <div class="wrapper d-flex flex-column min-vh-100 bg-light dark:bg-transparent">
        <header class="header header-sticky mb-4">
        <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <i class="fas fa-bars"></i>
        </button>
    <a class="header-brand d-md-none" href="#">
        <img src="{{ asset('image/logo/bn.jpg') }}" alt="" class="sidebar-brand-narrow img-fluid rounded-circle" width="46" height="46">
    </a>
    {{-- <ul class="header-nav d-none d-md-flex">
        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
    </ul> --}}
    {{-- <nav class="header-nav ms-auto me-4">
        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <input class="btn-check" id="btn-light-theme" type="radio" name="theme-switch" autocomplete="off" value="light" onchange="handleThemeChange(this)">
            <label class="btn btn-info text-white" for="btn-light-theme">
                <i class="icon fas fa-sun"></i>
            </label>
            <input class="btn-check" id="btn-dark-theme" type="radio" name="theme-switch" autocomplete="off" value="dark" onchange="handleThemeChange(this)">
            <label class="btn btn-info text-white" for="btn-dark-theme">
                <i class="icon fas fa-moon"></i>
            </label>
        </div>
    </nav> --}}
    <ul class="header-nav me-4 ms-auto">
        <li class="nav-item dropdown d-flex align-items-center">
            @if (Auth::guard('web')->check())
            <a href="#" data-coreui-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user py-0">
                {{-- <div class="avatar avatar-md">
                    <img class="avatar-img" src="{{ asset('image/avatar-1.png') }}" alt="avatar">
                </div> --}}
                <span class="badge badge-sm bg-info-gradient ms-2">Admin</span>
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('web')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                    <div class="fw-semibold">Options</div>
                </div>
                <a href="{{ route('admin.user') }}" class="dropdown-item has-icon text-primary">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @elseif (Auth::guard('teacher')->check())
            <a href="#" data-coreui-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user py-0">
                {{-- <div class="avatar avatar-md">
                    <span class="badge badge-sm bg-info-gradient ms-2">Teacher</span>
                    <img class="avatar-img" src="{{ asset('image/avatar-1.png') }}" alt="avatar">
                </div> --}}
                <span class="badge badge-sm bg-info-gradient ms-2">Teacher</span>
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('teacher')->user()->fullname }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                    <div class="fw-semibold">Options</div>
                </div>
                <a href="{{ route('teacher.profile') }}" class="dropdown-item has-icon text-primary">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @elseif (Auth::guard('student')->check())
            <a href="#" data-coreui-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user py-0">
                <span class="badge badge-sm bg-info-gradient ms-2">Student</span>
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('student')->user()->fullname }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                    <div class="fw-semibold">Options</div>
                </div>
                <a href="{{ route('student.profile') }}" class="dropdown-item has-icon text-primary">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            @endif
        </li>

        
        <!-- -->
        {{-- @if (Auth::guard('web')->check())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::guard('web')->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @elseif (Auth::guard('teacher')->check())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                <span class="badge badge-info pb-1 pt-1" style="font-size: 12px">Teacher</span>
                &nbsp;&nbsp;
                <div class="d-sm-none d-lg-inline-block">
                    Hi, {{ Auth::guard('teacher')->user()->fullname }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!-- <div class="dropdown-title">Logged in 5 min ago</div> -->
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @elseif (Auth::guard('student')->check())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                <span class="badge badge-info pb-1 pt-1" style="font-size: 12px">Student</span>
                &nbsp;&nbsp;
                @if (!empty(auth()->user()->profile_image))    
                <img alt="image" src="{{ asset('image/profile/'.auth()->user()->profile_image) }}" class="rounded-circle mr-1">
                @else
                <img alt="image" src="{{ asset('image/avatar-1.png') }}" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">
                    Hi, {{ Auth::guard('student')->user()->fullname }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <!---- <div class="dropdown-title">Logged in 5 min ago</div> -->
                <a href="#" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('auth.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

        @endif --}}
    </ul>
    {{-- <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#aside')).show()">
        <svg class="icon icon-lg">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
        </svg>
    </button> --}}
</div>
{{-- <div class="header-divider"></div> --}}
            {{-- <div class="container-fluid">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item">
                <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                <a href="#">Components</a>
                </li>
                <li class="breadcrumb-item">
                <a href="#">Base</a>
                </li>
                <li class="breadcrumb-item active"><span>Accordion</span></li>
                </ol>
                </nav>
            </div> --}}
    </header>
