<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="Dinas Kebudayaan Tulungagung, Seniman, Karya Seni, Detail" />
    <meta name="description" content="Detail karya seni dari seniman di Tulungagung." />
    <meta name="author" content="Dinas Kebudayaan Tulungagung" />

    <title>{{ $seniman->judul }} - Detail Seniman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('troweld/css/bootstrap.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('troweld/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('troweld/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('troweld/css/responsive.css') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5; /* Latar belakang abu-abu muda */
        }
        .header_section {
            background-color: #007bff; /* Warna header konsisten */
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .navbar-brand span {
            color: #ffffff; /* Warna teks brand */
        }
        .nav-link {
            color: #ffffff !important; /* Warna link navigasi */
        }
        .nav-link:hover {
            color: #e2e6ea !important;
        }
        .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        .detail-card {
            background-color: #ffffff;
            border-radius: 1.5rem; /* Sudut lebih membulat */
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15); /* Bayangan lebih menonjol */
            margin-top: 4rem; /* Jarak dari header */
            margin-bottom: 4rem;
            padding: 3rem; /* Padding internal lebih besar */
        }
        .detail-card .card-header {
            background-color: transparent;
            border-bottom: none;
            padding-bottom: 0;
        }
        .detail-card h2 {
            font-weight: 700;
            color: #007bff; /* Warna judul utama */
            font-size: 2.5rem; /* Ukuran judul lebih besar */
            margin-bottom: 1.5rem;
        }
        .detail-card img {
            max-width: 100%;
            height: auto;
            border-radius: 1rem; /* Sudut gambar membulat */
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
            object-fit: cover;
            width: 100%; /* Pastikan gambar mengisi lebar kolom */
            max-height: 500px; /* Batasi tinggi gambar */
        }
        .info-section h4 {
            font-weight: 600;
            color: #343a40; /* Warna judul informasi */
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 0.5rem;
        }
        .list-group-item {
            font-size: 1.1rem; /* Ukuran teks informasi lebih besar */
            padding: 0.75rem 0;
            border: none; /* Hapus border default */
            background-color: transparent;
        }
        .list-group-item strong {
            color: #007bff; /* Warna label informasi */
            min-width: 150px; /* Lebar minimum untuk label */
            display: inline-block;
        }
        .description-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #495057;
            text-align: justify;
        }
        .btn-back {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
            border-radius: 0.75rem;
            padding: 0.8rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
        }
        .footer_section {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            margin-top: 4rem;
        }
    </style>
</head>

<body>


    <section class="detail_seniman_section layout_padding">
        <div class="container">
            <div class="detail-card">
                <div class="card-header text-center">
                    <h2>{{ $seniman->judul }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7 mb-4 mb-md-0">
                            @if($seniman->foto)
                                <img src="{{ asset('storage/' . $seniman->foto) }}" class="img-fluid" alt="{{ $seniman->judul }}">
                            @else
                                <img src="https://placehold.co/800x500/cccccc/333333?text=No+Image" class="img-fluid" alt="Gambar Default">
                            @endif
                        </div>
                        <div class="col-md-5">
                            <div class="info-section">
                                <h4>Informasi Karya & Seniman</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong>Nama Seniman:</strong>
                                        <span>{{ $seniman->nama }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong>Alamat:</strong>
                                        <span>{{ $seniman->alamat }}</span>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <strong>Nomor Telepon:</strong>
                                        <span>{{ $seniman->nomor }}</span>
                                    </li>

                                    <li class="list-group-item d-flex align-items-center">
                                        <strong>Tanggal Posting:</strong>
                                        {{-- Menampilkan tanggal dan waktu posting secara akurat --}}
                                        <span>{{ $seniman->created_at->format('d M Y, H:i') }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="description-section mt-5">
                        <h4>Deskripsi Karya</h4>
                        <p>{{ $seniman->deskripsi }}</p>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('seniman') }}" class="btn btn-back">
                            <i class="fa fa-arrow-left me-2"></i> Kembali ke Daftar Seniman
                        </a>
                    </div>
                </div>
            </div>
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
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
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

    <script>
        // Script untuk tahun di footer
        document.getElementById('displayYear').textContent = new Date().getFullYear();

        // Script untuk inisialisasi Bootstrap dropdown (jika diperlukan)
        var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
        var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl)
        })
    </script>

</body>

</html>
