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

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('troweld/css/bootstrap.css') }}" />

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
    <link href="{{ asset('troweld/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('troweld/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('troweld/css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        @include('layouts.navbar')
        <!-- end header section -->
    </div>

    <!-- contact section -->
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Kontak Masukan<span>Dinas Kebudayaan</span></h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="form_container">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf {{-- Ini sangat penting untuk keamanan Laravel (CSRF Token) --}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="form-control" placeholder="Your Name" name="name"
                                        required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phone"
                                        required />
                                </div>
                                <div class="form-group col-lg-6">
                                    <select name="service" id="" class="form-control wide">
                                        <option value="">Pilih Layanan</option> {{-- Ganti teksnya --}}
                                        <option value="Service 1">Layanan 1</option>
                                        <option value="Service 2">Layanan 2</option>
                                        <option value="Service 3">Layanan 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="email" class="form-control" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="message-box form-control" placeholder="Message"
                                        name="message" required />
                                </div>
                            </div>
                            <div class="btn_box">
                                <button type="submit">
                                    KIRIM
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="map_container">
                    <div class="map">
                        <div id="googleMap" style="width:100%; height:400px;"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end contact section -->

    <!-- info section -->

    @include('layouts.info')

    <!-- end info section -->

    <!-- footer section -->

    @include('layouts.footer')

    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('troweld/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('troweld/js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--  OwlCarousel 2 - Filter -->
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="{{ asset('troweld/js/custom.js') }}"></script>
    <!-- Google Map -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>



<script>
    function myMap() {
        var tulungagung = { lat: -8.0657, lng: 111.9020 };
        var map = new google.maps.Map(document.getElementById("googleMap"), {
            center: tulungagung,
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: tulungagung,
            map: map,
            title: "Kabupaten Tulungagung"
        });
    }
</script>

    <!-- End Google Map -->

    {{-- SCRIPT DROPDOWN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
