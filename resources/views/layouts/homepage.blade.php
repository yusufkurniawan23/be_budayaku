<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dinas Kebudayaan Tulungagung</title>

    <!--Dropdown-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}troweld/css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('/') }}troweld/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}troweld/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/') }}troweld/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
@include('layouts.navbar')
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Selamat Datang <br />
                                    Portal Website Resmi<br />
                                    Dinas Kebudayaan Tulungagung
                                </h1>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Read More
                                    </a>
                                    <a href="" class="btn2">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Selamat Datang <br />
                                    Portal Website Resmi<br />
                                    Dinas Kebudayaan Tulungagung
                                </h1>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Read More
                                    </a>
                                    <a href="{{ route('contact') }}" class="btn2">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Selamat Datang <br />
                                    Portal Website Resmi<br />
                                    Dinas Kebudayaan Tulungagung
                                </h1>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Read More
                                    </a>
                                    <a href="" class="btn2">
                                        Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>Welcome to <span>Troweld</span></h2>
                        </div>
                        <p>
                            Simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever
                            since the 1500s, when an unknown printer took a galley of type
                            and scrambled it to make a type specimen book. It has s
                        </p>
                        <a href="">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="{{ asset('/') }}troweld/images/about-img.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- portfolio section -->

    <section class="portfolio_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Work Portfolio
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="filter_box">
                    <nav class="owl-filter-bar">
                        <a href="#" class="item active" data-owl-filter="*">All</a>
                        <a href="#" class="item" data-owl-filter=".decorative">DECORATIVE</a>
                        <a href="#" class="item" data-owl-filter=".facade">FACADES </a>
                        <a href="#" class="item" data-owl-filter=".perforated">PERFORATED
                        </a>
                        <a href="#" class="item" data-owl-filter=".railing">RAILINGS </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="owl-carousel portfolio_carousel">
            <div class="item decorative">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('/') }}troweld/images/p1.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="" class="">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item facade">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('/') }}troweld/images/p2.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="" class="">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item perforated decorative">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('/') }}troweld/images/p3.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="" class="">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item railing">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ asset('/') }}troweld/images/p1.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="" class="">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end portfolio section -->

    <!-- service section -->

    <section class="service_section layout_padding">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2>Our <span>Services</span></h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s1.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Home Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s2.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Gate Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s3.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Window Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s4.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Machine Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s5.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Bike Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="{{ asset('/') }}troweld/images/s6.png" alt="" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Car Welding
                            </h5>
                            <p>
                                when looking at its layout. The point of using Lorem Ipsum is
                                that it has a more-or-less normal
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    Read More
                </a>
            </div>
        </div>
    </section>

    <!-- end service section -->

    <!-- contact section -->
    <section class="contact_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Get In <span>Touch</span></h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="form_container">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="form-control" placeholder="Your Name" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" placeholder="Phone Number" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <select name="" id="" class="form-control wide">
                                        <option value="">Select Service</option>
                                        <option value="">Service 1</option>
                                        <option value="">Service 2</option>
                                        <option value="">Service 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="message-box form-control" placeholder="Message" />
                                </div>
                            </div>
                            <div class="btn_box">
                                <button>
                                    SEND
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->

    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Testimonial
                </h2>
            </div>
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div id="customCarousel2" class="carousel slide" data-ride="carousel">
                        <div class="row">
                            <div class="col-md-11">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="box">
                                            <div class="client_id">
                                                <div class="img-box">
                                                    <img src="{{ asset('/') }}troweld/images/client.jpg"
                                                        alt="" />
                                                </div>
                                                <h5>
                                                    Alex Jonson
                                                </h5>
                                            </div>
                                            <div class="detail-box">
                                                <p>
                                                    ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="box">
                                            <div class="client_id">
                                                <div class="img-box">
                                                    <img src="{{ asset('/') }}troweld/images/client.jpg"
                                                        alt="" />
                                                </div>
                                                <h5>
                                                    Alex Jonson
                                                </h5>
                                            </div>
                                            <div class="detail-box">
                                                <p>
                                                    ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="box">
                                            <div class="client_id">
                                                <div class="img-box">
                                                    <img src="{{ asset('/') }}troweld/images/client.jpg"
                                                        alt="" />
                                                </div>
                                                <h5>
                                                    Alex Jonson
                                                </h5>
                                            </div>
                                            <div class="detail-box">
                                                <p>
                                                    ipsum dolor sit amet, consectetur adipiscing elit,
                                                    sed do eiusmod tempor incididunt ut labore et dolore
                                                    magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                    exercitation ullamco laboris nisi ut aliquip ex ea
                                                    commodo consequat. Duis aute irure dolor in
                                                    reprehenderit in voluptate velit
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <ol class="carousel-indicators">
                                    <li data-target="#customCarousel2" data-slide-to="0" class="active"></li>
                                    <li data-target="#customCarousel2" data-slide-to="1"></li>
                                    <li data-target="#customCarousel2" data-slide-to="2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->

    <!-- info section -->

    @include('layouts.info')

    <!-- end info section -->

    <!-- footer section -->
  @include('layouts.footer')
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('/') }}troweld/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('/') }}troweld/js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--  OwlCarousel 2 - Filter -->
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="{{ asset('/') }}troweld/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
