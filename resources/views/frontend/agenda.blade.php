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

    <!-- service section -->

<section class="service_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Agenda Acara <span>Kebudayaan</span></h2>
            <p>Berikut adalah daftar acara kebudayaan terbaru yang diselenggarakan oleh Dinas Kebudayaan Tulungagung.</p>
        </div>

        <div class="row">
            @forelse ($agenda as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="box p-3 shadow rounded bg-light h-100 border border-warning">
                        <div class="detail-box">
                            <h5 class="text-dark fw-bold">{{ $item->judul }}</h5>
                            <small class="text-muted d-block mb-1">
                                <i class="fa fa-map-marker text-danger"></i> {{ $item->lokasi }}
                            </small>
                            <small class="text-muted d-block mb-1">
                                <i class="fa fa-calendar text-primary"></i>
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d M Y') }}
                                - {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d M Y') }}
                            </small>
                            <p class="mt-2 text-secondary">{{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}</p>
                            {{-- <a href="{{ route('frontend.agenda_detail', $item->id) }}" class="btn btn-sm btn-warning mt-2">Lihat Detail Acara</a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada agenda acara kebudayaan saat ini.</p>
                </div>
            @endforelse
        </div>

        @if ($agenda->hasPages())
            <div class="btn-box mt-4 text-center">
                {{ $agenda->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>
</section>




    <!-- end service section -->

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
