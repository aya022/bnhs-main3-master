<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Portal</title>

    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-1"></script>
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
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('../layout/navbar')
            @include('../layout/main-sidebar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            @include('../layout/footer')
        </div>
    </div>
    <script>
        if (document.body.classList.contains('dark-theme')) {
          var element = document.getElementById('btn-dark-theme');
          if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-dark-theme').checked = true;
          }
        } else {
          var element = document.getElementById('btn-light-theme');
          if (typeof(element) != 'undefined' && element != null) {
            document.getElementById('btn-light-theme').checked = true;
          }
        }
  
      function handleThemeChange(src) {
        var event = document.createEvent('Event');
        event.initEvent('themeChange', true, true);

        if (src.value === 'light') {
          document.body.classList.remove('dark-theme');
        }
        if (src.value === 'dark') {
          document.body.classList.add('dark-theme');
        }
        document.body.dispatchEvent(event);
      }
      //
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-118965717-1');
    </script>
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
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>
    <script src="{{ asset('js/global.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    @yield('moreJs')

    {{-- <script>
      document.getElementById("field_ucfirst").addEventListener("keypress", function(e) {
        if(this.selectionStart == 0) {
          // uppercase first letter
          forceKeyPressUppercase(e);
        } else {
          // lowercase other letters
          forceKeyPressLowercase(e);
        }
      }, false);
    </script> --}}
</body>
</html>