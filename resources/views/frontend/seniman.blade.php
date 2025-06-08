<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="Dinas Kebudayaan Tulungagung, Seniman, Karya Seni" />
    <meta name="description" content="Daftar seniman dan karya seni dari Tulungagung." />
    <meta name="author" content="Dinas Kebudayaan Tulungagung" />

    <title>Seniman - Dinas Kebudayaan Tulungagung</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('troweld/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <link href="{{ asset('troweld/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('troweld/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('troweld/css/responsive.css') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 0.75rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            border: none;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        }
        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-top-left-radius: 0.75rem;
            border-top-right-radius: 0.75rem;
        }
        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-title {
            font-weight: 700;
            color: #007bff;
            margin-bottom: 0.75rem;
        }
        .card-text {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.5;
        }
        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: white;
            border-radius: 0.5rem;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
            transition: background-color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
        }
        .heading_center {
            text-align: center;
            margin-bottom: 3rem;
            margin-top: 2rem;
        }
        .heading_center h2 {
            font-weight: 700;
            color: #333;
        }
        .heading_center h2 span {
            color: #007bff;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-link {
            color: #007bff;
        }
        .alert-info {
            background-color: #e0f7fa;
            border-color: #b2ebf2;
            color: #007bff;
            border-radius: 0.75rem;
            padding: 1.5rem;
            font-size: 1.1rem;
        }
        /* Style untuk form pencarian */
        .search-form-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }
        .search-form-container .form-control {
            border-radius: 0.5rem;
        }
        .search-form-container .btn {
            border-radius: 0.5rem;
            font-weight: 600;
        }
    </style>
</head>

<body class="sub_page">
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

                                <!-- Menu Utama -->
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
                                <li class="nav-item {{ request()->routeIs('budaya') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('budaya') }}">Kebudayaan</a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('contact') ? 'active fw-bold' : '' }}">
                                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                </li>

                                <!-- Autentikasi -->
                                @auth
                                    @if (auth()->user()->role === 'admin')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('layouts.app') }}">
                                                <i class="fa fa-user-shield"></i> Admin Dashboard
                                            </a>
                                        </li>
                                    @endif

                                    <!-- Dropdown User -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user me-1"></i> {{ auth()->user()->name }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <!-- Menu Profile -->
                                            <li>
                                                <a class="dropdown-item" href="{{ route('profile.index') }}">
                                                    <i class="fa fa-id-card me-1"></i> Profile
                                                </a>
                                            </li>

                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>

                                            <!-- Menu Logout -->
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

                                <!-- Pencarian -->
                                <li class="nav-item ms-2">
                                    <form class="d-flex" role="search" action="{{ route('seniman') }}" method="GET">
                                        <input class="form-control me-2" type="search" name="search" placeholder="Cari Seniman..."
                                            aria-label="Search" value="{{ request('search') }}">
                                        <button class="btn btn-outline-light" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>


    <section class="seniman_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Daftar <span>Seniman</span></h2>
            </div>

            <div class="search-form-container mb-5">
                <form action="{{ route('seniman') }}" method="GET" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="year" class="form-label">Tahun Upload:</label>
                        <select class="form-select" id="year" name="year">
                            <option value="">Semua Tahun</option>
                            @php
                                $currentYear = date('Y');
                                for ($y = $currentYear; $y >= 2000; $y--) { // Sesuaikan rentang tahun
                                    echo "<option value='{$y}' " . (request('year') == $y ? 'selected' : '') . ">{$y}</option>";
                                }
                            @endphp
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="month" class="form-label">Bulan Upload:</label>
                        <select class="form-select" id="month" name="month">
                            <option value="">Semua Bulan</option>
                            @php
                                $months = [
                                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                                ];
                                foreach ($months as $num => $name) {
                                    echo "<option value='{$num}' " . (request('month') == $num ? 'selected' : '') . ">{$name}</option>";
                                }
                            @endphp
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="date" class="form-label">Tanggal Upload:</label>
                        <input type="number" class="form-control" id="date" name="date" min="1" max="31" placeholder="Tanggal" value="{{ request('date') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                    @if(request('year') || request('month') || request('date') || request('search'))
                        <div class="col-12 mt-3">
                            <a href="{{ route('seniman') }}" class="btn btn-outline-secondary w-100">Reset Pencarian</a>
                        </div>
                    @endif
                </form>
            </div>
            @if($seniman->isEmpty())
                <div class="alert alert-info text-center mt-5" role="alert">
                    Tidak ada seniman yang ditemukan dengan kriteria pencarian tersebut.
                </div>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($seniman as $data)
                        <div class="col">
                            <div class="card h-100">
                                @if($data->foto)
                                    <img src="{{ asset('storage/' . $data->foto) }}" class="card-img-top" alt="{{ $data->judul }}">
                                @else
                                    <img src="https://placehold.co/600x400/cccccc/333333?text=No+Image" class="card-img-top" alt="Gambar Default">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $data->judul }}</h5>
                                    <p class="card-text mb-1"><small class="text-muted"><strong>Oleh:</strong> {{ $data->nama }}</small></p>
                                    <p class="card-text mb-2"><small class="text-muted">{{ $data->alamat }}</small></p>
                                    <p class="card-text flex-grow-1">{{ Str::limit($data->deskripsi, 120) }}</p>
                                    <p class="card-text text-end"><small class="text-muted">Diunggah pada: {{ $data->created_at->format('d M Y, H:i') }}</small></p>
                                    <div class="mt-auto text-center">
                                        <a href="{{ route('profile.seniman.show', $data->id) }}" class="btn btn-info mt-2">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {!! $seniman->links() !!}
                </div>
            @endif
        </div>
    </section>
    {{-- LAYOUTS INFO --}}
    @include('layouts.info')

    {{-- LAYOUTS FOOTER --}}
    @include('layouts.footer')

    <script src="{{ asset('troweld/js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        xintegrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <script src="{{ asset('troweld/js/custom.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    </body>

</html>
