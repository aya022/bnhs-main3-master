<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>eBNHS . Suuccess</title>

    <link rel="shortcut icon" href="{{ asset('image/logo/bn.jpg') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <style>
      .iconColor {
        color: #6c7cf0;
      }
    </style>
</head>

<body>
    <div id="app">
        <section class="section">
          <div class="container">
            <div class="row">
              <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 mt-5">
    
                <div class="card card-hero">
                  <div class="card-header pb-3">
                    <div class="card-icon">
                        <i class="fas fa-pen"></i>
                      </div>
                      <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid mb-3" style="height: 50px;">
                      <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid mb-3" style="height: 50px;">
                      <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded-circle mb-3" style="height: 50px;">
                      <h4>{{ $data }}</h4>
                      <div class="card-description">ENROLLMENT NO.</div>
                  </div>
    
                  <div class="card-body">
                    
                    <div class="tickets-list">
                        <div class="ticket-item">
                          <div class="ticket-title">
                            <div class="login-brand">
                                <h5 class="mt-3">Pre-Enrollment was successful</h5>
                                <small>{{ date("Y-m-d") }}</small>
                            </div>
                          </div>
                        </div>
                        <ul class="list-unstyled list-unstyled-border p-2">
                          <li class="media">
                              <i class="mr-3 rounded fas fa-pen mr-4 my-2 iconColor" style="font-size: 30px"></i>
                              <div class="media-body">
                                  <div class="media-right my-2" style="font-size: 25px"></div>
                                  <div class="media-title">Balaogan National High School</div>
                                  <div class="text-muted text-small">School Contact & Information</div>
                              </div>
                          </li>
                          <li class="media">
                              <i class="mr-3 rounded far fa-address-card mr-4 my-2 iconColor" style="font-size: 30px"></i>
                              <div class="media-body">
                                  <div class="media-right my-2" style="font-size: 25px"></div>
                                  <div class="media-title">09918742564</div>
                                  <div class="text-muted text-small">Contact No.
                                  </div>
                              </div>
                          </li>
                          <li class="media">
                              <i class="mr-3 rounded fas fa-at mr-4 my-2 iconColor" style="font-size: 30px"></i>
                              <div class="media-body">
                                  <div class="media-right my-2" style="font-size: 25px"></div>
                                  <div class="media-title">302016@deped.gov.ph</div>
                                  <div class="text-muted text-small">Email
                                  </div>
                              </div>
                          </li>
                          <li class="media">
                              <i class="mr-3 rounded fas fa-map-marked-alt mr-4 my-2 iconColor" style="font-size: 30px"></i>
                              <div class="media-body">
                                  <div class="media-right my-2" style="font-size: 25px"></div>
                                  <div class="media-title">Balaogan, Bula, Camarines Sur</div>
                                  <div class="text-muted text-small">Address
                                  </div>
                              </div>
                          </li>
                          <li class="media">
                              <div class="media-body">
                                  <div class="text-small" style="font-size: 15px;">
                                      <b class="note text-danger">* Note:</b> Your data and requirements are being process, please wait for the further notice until the validation is complete.<br> 
                                      Please download this enrollment for your inquries<br> 
                                      Thank you!
                                  </div>
                              </div>
                          </li>
                      </ul>
                      
                    </div>
                </div>
                <div class="tickets-list">
                  <div class="row">
                      <div class="col-md-6">
                          <a href="/form" class="ticket-item ticket-more btn btn-icon icon-left btn-secondary" id="app">
                              <i class="fas fa-arrow-circle-left"></i>Back</a>
                      </div>
                      <div class="col-md-6">
                          <a href="{{ route('done.download',$data) }}" class="ticket-item ticket-more btn btn-icon icon-left btn-primary" id="app">
                            <i class="fas fa-download"></i>Download Form</a>
                      </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>