<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Cagar Budaya - Dinas Kebudayaan Tulungagung</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('troweld/css/bootstrap.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <link href="{{ asset('troweld/css/font-awesome.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('troweld/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('troweld/css/responsive.css') }}" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        @include('layouts.navbar')
        </div>

    <section class="portfolio_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Cagar Budaya Tulungagung
                </h2>
            </div>

            @if ($budayas->isEmpty())
                <p class="text-center">Belum ada data Cagar Budaya.</p>
            @else
                <div class="row">
                    @foreach ($budayas as $budaya)
                        <div class="col-md-4 mb-4">
                            <div class="box">
                                <div class="img-box">
                                    @if ($budaya->foto)
                                        <img src="{{ asset('storage/' . $budaya->foto) }}" alt="{{ $budaya->nama_objek }}" style="width: 100%; height: 250px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/400x250?text=No+Image" alt="No Image" style="width: 100%; height: 250px; object-fit: cover;">
                                    @endif
                                    <div class="btn_overlay">
                                        <a href="{{ route('budaya.show', $budaya->id) }}" class="">
                                            Lihat Detail
                                        </a>
                                    </div>
                                </div>
                                <div class="detail-box mt-3 text-center">
                                    <h5>{{ $budaya->nama_objek }}</h5>
                                    <p class="text-muted">{{ \Carbon\Carbon::parse($budaya->tanggal)->translatedFormat('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $budayas->links() }}
                </div>
            @endif
        </div>
    </section>

        <section class="info_section ">
        <div class="info_container layout_padding2">
            <div class="container">
                <div class="info_logo">
                    <a class="navbar-brand" href="{{ route('layouts.homepage') }}"> Dinas<span>Kebudayaan</span> </a>
                </div>
                <div class="info_main">
                    <div class="row">
                        <div class="col-md-3 col-lg-2">
                            <div class="info_link-box">
                                <h5>
                                    Useful Link
                                </h5>
                                <ul>
                                    <li class=" active">
                                        <a class="" href="{{ route('layouts.homepage') }}">Home <span
                                                class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="">
                                        <a class="" href="{{ route('agenda') }}">Agenda </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="{{ route('seniman') }}">Seniman </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="{{ route('budaya') }}">Kebudayaan </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="{{ route('contact') }}"> Contact </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <h5>
                                Welding
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscinaliquaLoreadipiscing
                            </p>
                        </div>
                        <div class="col-md-3 mx-auto ">
                            <h5>
                                social media
                            </h5>
                            <div class="social_box">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>
                                Our welding center
                            </h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur
                                adipiscinaliquaLoreadipiscing
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info_bottom">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="info_contact ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Location
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>
                                                Call +01 1234567890
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span>
                                                demo@gmail.com
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info_form ">
                                <form action="">
                                    <input type="email" placeholder="Enter Your Email" />
                                    <button>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer_section">

    <script src="{{ asset('troweld/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="{{ asset('troweld/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <script src="{{ asset('troweld/js/custom.js') }}"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
