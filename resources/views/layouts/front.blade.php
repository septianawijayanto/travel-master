<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('/frontend')}}/assets/img/favicon.png" rel="icon">
    <link href="{{asset('/frontend')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('/frontend')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/frontend')}}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="{{asset('/frontend')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/frontend')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('/frontend')}}/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="{{asset('/frontend')}}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('/frontend')}}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: KnightOne - v2.1.0
  * Template URL: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-9 d-flex align-items-center justify-content-between">
                    <h1 class="logo"><a href="index.html">CV. PO. KERINCI MULYA</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>
                            <li class="active"><a href="{{ url('/')}}">Home</a></li>
                            <li><a href="{{ url('/about')}}">About</a></li>
                            <li><a href="{{ url('/login')}}">Pesan</a></li>
                            <li class="drop-down"><a href="">Login</a>
                                <ul>

                                    <li><a href="{{ url('/login')}}">Login</a></li>
                                    <li><a href="{{ url('/registrasi')}}">Registrasi</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/kontak')}}">Kontak Person</a></li>

                        </ul>
                    </nav><!-- .nav-menu -->

                    <a href="#about" class="get-started-btn scrollto">Get Started</a>
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">

                    <h1>CV. PO. KERINCI MULYA</h1>

                    <h2>Jalana Patimura (Depan SPBU Kuburan Cina) Jambi</h2>

                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            @yield('konten')

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>Kerinci Mulya</h3>
            <div class="social-links">

            </div>
            <h6>No Rekening Pembayaran</h6>
            <h6> BRI
                a.n. kerinci mulya :
                0020.08.002015.80.2</h6>
            <br>
            <div class="copyright">
                &copy; Copyright <strong><span>Kerinci Mulya</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/knight-simple-one-page-bootstrap-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('/frontend')}}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/counterup/counterup.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/venobox/venobox.min.js"></script>
    <script src="{{asset('/frontend')}}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('/frontend')}}/assets/js/main.js"></script>

</body>

</html>