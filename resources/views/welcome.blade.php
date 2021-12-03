<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>eBNHS . Portal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('image/logo/bn.jpg') }}" rel="icon">
  <link href="{{ asset('landingPage/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}

  <!-- Vendor CSS Files -->
  <link href="{{ asset('landingPage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('landingPage/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('landingPage/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v4.6.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo">eBNHS</h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Requirements</a></li>
          <li><a class="nav-link scrollto" href="#services">Tract and Strand</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Mission, Vision and Core</a></li>
          <li><a class="getstarted scrollto" href="{{ route('auth.login') }}">
            <i class="ri-login-box-line"></i>&nbsp;&nbsp;Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <div class="row">
            <div class="col-md-4 col-12 mb-3">
              <img src="{{ asset('image/logo/deped.png') }}" class="img-fluid rounded " style="height: 100px;">
            </div>
            <div class="col-md-4 col-12 mb-3">
              <img src="{{ asset('image/logo/bn.jpg') }}" class="img-fluid rounded rounded-circle" style="height: 100px;">
            </div>
            <div class="col-md-4 col-12 mb-3">
              <img src="{{ asset('image/logo/dept.png') }}" class="img-fluid rounded " style="height: 100px;">
            </div>
          </div>
          <h1>Balaogan National High School</h1>
          <h2><em>&ldquo;Education's purpose is to replace an empty mind with an open one.&rdquo;</em></h2>
        </div>
      </div>
      <div class="text-center">
        <a href="{{ route('auth.login') }}" class="btn-get-started scrollto"><i class="ri-login-box-line" style="font-size: 14px;"></i>&nbsp;&nbsp;Login</a>
        <a href="{{ route('form') }}" class="btn-get-started scrollto"><i class="ri-file-list-3-fill" style="font-size: 14px;"></i>&nbsp;&nbsp;Pre-enrollment</a>
        <a href="{{ route('appoint') }}" class="btn-get-started scrollto"><i class="ri-calendar-check-fill" style="font-size: 14px;"></i>&nbsp;&nbsp;Appointment</a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pre-Enrollment Requirements</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. </p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <h6 class="mb-1"><b>REQUIREMENTS FOR INCOMING GRADE 7, TRANSFEREES, AND BALIK ARAL</b></h6>
            <ul>
              <li><i class="ri-check-double-line"></i>Copy of Latest Grades</li>
              <li><i class="ri-check-double-line"></i>Copy of Good Moral Certificate</li>
              <li><i class="ri-check-double-line"></i>Copy of PSA Birth Certificate</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Balaogan Nationa High School Portal innovates the manual enrollment into automated process that can help and improve the speed of enrollment transaction. It has also an appoinment feature where the guest can schedule their appointment to the school.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tract and Strand</h2>
          <p>Each student in Senior High School can choose among three tracks: Academic; Technical-Vocational-Livelihood; and Sports and Arts. The Academic track includes three strands: Business, Accountancy, Management (BAM); Humanities, Education, Social Sciences (HESS); and Science, Technology, Engineering, Mathematics (STEM).</p>

          <p>Students undergo immersion, which may include earn-while-you-learn opportunities, to provide them relevant exposure and actual experience in their chosen track.</p>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="ri-hand-heart-line"></i>
              </div>
              <h4><a href="">Caregiving</a></h4>
              <p>Understanding the challenges and responsibilities of elder care, learning how to deal with day-to-day challenges and providing a safe and senior-friendly environment to loved ones is essential in the caregiving process.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="ri-computer-line"></i>
              </div>
              <h4><a href="">ICT</a></h4>
              <p>The Information Communication Technology course combines theoretical and practical studies focusing on the ability to use common software applications, including word processors, spreadsheets, databases, interactive presentation software, e-mail, web browsers and website design.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="ri-book-mark-line"></i>
              </div>
              <h4><a href="">General Academic Strand</a></h4>
              <p>GAS is a Senior High School strand that takes on a generalist approach in preparing students for college. It covers various disciplines like Humanities, Social Sciences, Organization, and Management.</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="ri-leaf-line"></i>
              </div>
              <h4><a href="">Horticulture</a></h4>
              <p>This course is designed to introduce the student to the basic concepts and skills utilized in 
              horticulture. Students will receive an introduction to basic botanical concepts such as 
              morphology, anatomy, taxonomy, physiology, genetics, and propagation as they apply to 
              horticulture.</p>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Sevices Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Mission, Vision, and Core Values</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="zoom-im" data-aos-delay="100">
            <div class="box">
              <h3>Vision</h3>
              <p>
                We dream of Filipinos
                who passionately love their country
                and whose values and competencies
                enable them to realize their full potential
                and contribute meaningfully to building the nation.
              </p>
              <p>
                As a learner-centered public institution,
                the Department of Education
                continuously improves itself
                to better serve its stakeholders. 
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="box featured">
              <h3>Mission</h3>
              <ul class="text-left">
                <li>To protect and promote the right of every Filipino to quality, equitable, culture-based, and complete basic education where:</li>
                <li><b>Students</b> learn in a child-friendly, gender-sensitive, safe, and motivating environment.</li>
                <li><b>Teachers</b> facilitate learning and constantly nurture every learner.</li>
                <li><b>Administrators</b> and staff, as stewards of the institution, ensure an enabling and supportive environment for effective learning to happen.</li>
                <li><b>Family, community, and other stakeholders</b> are actively engaged and share responsibility for developing life-long learners.</li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="box">
              <h3>Core Values</h3>
              <i>
                <p>
                Maka-Diyos
              </p>
              <p>Maka-tao</p>
              <p>Makakalikasan</p>
              <p>Makabansa</p>
              </i>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>OnePage</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('landingPage/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('landingPage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('landingPage/assets/js/main.js') }}"></script>

</body>

</html>