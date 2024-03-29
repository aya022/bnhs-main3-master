<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Login</title>
    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">

    <link rel="stylesheet" href="{{ asset('css/coreuistyle/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/prism.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/free.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simple-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('moreCss')
    <link rel="stylesheet" href="{{ asset('css/toast/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
</head>

<body>

    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card  d-block d-md-flex row mb-3 shadow">
                        <div class="card-body text-center">
                            <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle" style="height: 100px;">
                            <h1>Balaogan National High School</h1>
                            <p class="text-medium-emphasis">Balaogan, Bula, Camarines Sur</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row shadow">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                @if (session()->has('msg'))
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ session('msg') }}
                                </div>
                                @endif
                                <form method="POST" action="{{ route('auth.login_post') }}" class="needs-validation" novalidate="">@csrf
                                    <div class="input-group mb-3"><span class="input-group-text">
                                        <i class="far fa-user"></i></span>
                                        <input id="get_your_input" class="form-control" type="text" placeholder="Username" name="get_your_input" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill this field [username or ID No.]
                                        </div>
                                    </div>
                                    <div class="input-group mb-4"><span class="input-group-text">
                                        <i class="fas fa-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required placeholder="Password"  required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-info px-4" type="submit" style="color: #fff;">Login</button>
                                        <a href="/" class="btn btn-secondary" style="color: #fff;">Back to Home</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card col-md-5 text-white bg-info py-5">
                            <div class="card-body text-center">
                                <div class="text-left">
                                    <h2>Transactions</h2>
                                    <a href="/appoint/register" class="btn btn-lg btn-outline-light mt-3">
                                        <span class="fas fa-calendar-check"></span>&nbsp;&nbsp;Get Appointment
                                    </a>
                                    <a href="/form" class="btn btn-lg btn-outline-light mt-3">
                                        <span class="fab fa-wpforms"></span>&nbsp;&nbsp;Pre-enroll Now!
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/coreui/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('js/coreui/prism-autoloader.min.js') }}"></script>
    <script src="{{ asset('js/coreui/prism-normalize-whitespace.js') }}"></script>
    <script src="{{ asset('js/coreui/prism-unescaped-markup.min.js') }}"></script>
    <script src="{{ asset('js/coreui/prism.js') }}"></script>
    <script src="{{ asset('js/coreui/simplebar.min.js') }}"></script>
    
    <script src="{{ asset('js/toast/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/toast/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>
</body>

</html>