<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Login</title>
    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/coreui.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/coreuistyle/prism.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simple-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/coreuistyle/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css"> --}}
</head>

<body>

    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            <div class="card-body">
                                <h1>Login</h1>
                                <p class="text-medium-emphasis">Sign In to your account</p>
                                @if (session()->has('msg'))
                                <div class="alert alert-warning text-center" role="alert">
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
                                        <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required placeholder="Password"  required autofocus>
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
                                    <h2>BNHS Transactions</h2>
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

    <script src="{{ asset('js/coreui/coreui.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('js/coreui/prism-autoloader.min.js') }}"></script>
    <script src="{{ asset('js/coreui/prism-normalize-whitespace.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/coreui/prism-unescaped-markup.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/coreui/prism.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/coreui/simplebar.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/prism.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/autoloader/prism-autoloader.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/unescaped-markup/prism-unescaped-markup.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/plugins/normalize-whitespace/prism-normalize-whitespace.js"></script> --}}
</body>

</html>