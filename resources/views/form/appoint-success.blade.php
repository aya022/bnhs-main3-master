<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Slip</title>

    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <style>
        .center-screen {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* text-align: center; */
            min-height: 90vh;
        }

        .full .ui-state-default {
            color: red;
            border: 1px solid red;
        }

        .vacant .ui-state-default {
            color: green;
            border: 1px solid green;
        }

        .not .ui-state-default {
            color: gray;
            border: 1px solid gray;
        }
        .note {
            color: #ff0000;     
        }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                        <div id="capture">
                            <div class="card card-hero shadow-lg">
                                <div class="card-header">
                                    <div class="card-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid mb-3" style="height: 50px;">
                                    <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle mb-3" style="height: 50px;">
                                    <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid mb-3" style="height: 50px;">
                                    <h4><small style="font-size: 15px">No.</small> {{$appointment->appoint_no }}</h4>
                                    <div class="card-description mt-3"><h3>Appointment Slip</h3></div>
                                </div>

                                <div class="card-body p-0">
                                    <ul class="list-unstyled list-unstyled-border p-4">
                                        <li class="media">
                                            <i class="mr-3 rounded fas fa-user mr-4 my-2" style="font-size: 23px"></i>
                                            <div class="media-body">
                                                <div class="media-right my-2" style="font-size: 25px"></div>
                                                <div class="media-title">{{$appointment->fullname }}</div>
                                                <div class="text-muted text-small"  style="text-transform: capitalize;">Fullname</div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="mr-3 rounded fas fa-map-marked-alt mr-4 my-2" style="font-size: 23px"></i>
                                            <div class="media-body">
                                                <div class="media-right my-2" style="font-size: 25px"></div>
                                                <div class="media-title" style="text-transform: capitalize;">{{$appointment->address }}</div>
                                                <div class="text-muted text-small">Address
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="mr-3 rounded fas fa-calendar mr-4 my-2" style="font-size: 23px"></i>
                                            <div class="media-body">
                                                <div class="media-right my-2" style="font-size: 25px"></div>
                                                <div class="media-title">{{$appointment->set_date }}</div>
                                                <div class="text-muted text-small">Date
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <i class="mr-3 rounded fas fa-pen mr-4 my-2" style="font-size: 23px"></i>
                                            <div class="media-body">
                                                <div class="media-right my-2" style="font-size: 25px"></div>
                                                <div class="media-title">{{$appointment->purpose }}</div>
                                                <div class="text-muted text-small">Purpose
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <div class="text-small">
                                                    <b class="note">* Note:</b> This will serve  as a proof of appointment,
                                                    present this to the personnel in charge upon entering the school the day of your appointment. <br> 
                                                    Thank you!
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tickets-list">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('appoint') }}" class="ticket-item ticket-more btn btn-icon icon-left btn-secondary" id="app">
                                                    <i class="fas fa-arrow-circle-left"></i>Back</a>
                                            </div>
                                            <div class="col-md-6">
                                                <button id="btn" class="ticket-item ticket-more btn btn-icon icon-left btn-info">
                                                    <i class="fas fa-download"></i>Download Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- JS Libraies -->
    <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/global.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/html2canvas/html2canvas.js') }}"></script>
    <script>
    $("#btn").on('click',function(){
        $(".card-hero").removeClass('shadow-lg')
        
        $(this).hide();
      setTimeout(() => {
        $(".card-body").addClass("bg-white")
        html2canvas(document.getElementById("capture")).then(function (canvas) {
        var a=document.createElement('a');
                a.href = canvas.toDataURL("image/png");
                a.download = "appointment_slip.png";
                a.click();
     });
     $(".card-hero").addClass('shadow-lg')
     $(this).show();   
      }, 1500);
    })
    </script>
</body>

</html>