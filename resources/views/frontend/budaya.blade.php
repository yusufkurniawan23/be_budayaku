<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Dinas Kebudayaan Tulungagung</title>

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
        <header class="header_section">

            <div class="header_bottom">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <a class="navbar-brand navbar_brand_mobile" href="index.html"> Tro<span>Weld</span> </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto align-items-center">

                                <li
                                    class="nav-item {{ request()->routeIs('layouts.homepage') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('layouts.homepage') }}">Home</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('agenda') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('seniman') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('seniman') }}">Seniman</a>
                                </li>
                                <li class="nav-item dropdown {{ request()->routeIs('budaya*') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="{{ route('budaya') }}" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Kebudayaan
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ route('cagar.budaya') }}">Cagar
                                                Budaya</a></li>
                                        <li><a class="dropdown-item" href="{{ route('cagar.alam') }}">Cagar Alam</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item {{ request()->routeIs('contact') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                </li>

                                @auth
                                    @if (auth()->user()->role === 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('layouts.app') }}">
                                                <i class="fa fa-user-shield"></i> Admin Dashboard
                                            </a>
                                        </li>
                                    @endif

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user me-1"></i> {{ auth()->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                                    <i class="fa fa-id-card me-1"></i> Profile
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <li>
                                                <a class="dropdown-item text-danger" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out-alt me-1"></i> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>

                                @endauth

                                @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-sign-in-alt"></i> Login
                                        </a>
                                    </li>
                                @endguest

                                {{-- <li class="nav-item ms-2">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-light" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li> --}}

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        </div>

    <section class="portfolio_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Kebudayaan
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="filter_box">
                    <nav class="owl-filter-bar">
                        <a href="#" class="item active" data-owl-filter="*">Semua</a>
                        <a href="#" class="item" data-owl-filter=".cagar-budaya">Cagar Budaya</a>
                        <a href="#" class="item" data-owl-filter=".cagar-alam">Cagar Alam</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="owl-carousel portfolio_carousel">
            @foreach($budayas as $budaya)
                <div class="item {{ Str::slug($budaya->category->name) }}"> {{-- Gunakan slug dari nama kategori --}}
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('storage/' . $budaya->foto) }}" alt="{{ $budaya->nama_objek }}" />
                            <div class="btn_overlay">
                                <a href="{{ route('budaya.show', $budaya->id) }}" class="">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $budaya->nama_objek }}
                            </h5>
                            <p>
                                {{ Str::limit($budaya->deskripsi, 100) }} {{-- Batasi deskripsi --}}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    {{-- LAYOUTS INFO --}}
    @include('layouts.info')

    {{-- LAYOUTS FOOTER --}}
    @include('layouts.footer')


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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>

    {{-- SCRIPT DROPDOWN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Owl Carousel
            var owl = $('.portfolio_carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

            // Filter Owl Carousel
            $('.owl-filter-bar').on('click', '.item', function(e) {
                e.preventDefault();
                $('.owl-filter-bar .item').removeClass('active');
                $(this).addClass('active');
                var filter = $(this).data('owl-filter');
                owl.owlcarousel2filter(filter);
            });
        });
    </script>
</body>

</html>
