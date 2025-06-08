@extends('layouts.frontend')

@section('content')
<section class="layout_padding">
    <div class="container">
        <h2 class="text-center text-primary fw-bold mb-4">{{ $agenda->judul }}</h2>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card p-4 shadow">
                    <p><i class="fa fa-map-marker text-danger"></i> <strong>Lokasi:</strong> {{ $agenda->lokasi }}</p>
                    <p><i class="fa fa-calendar text-primary"></i> <strong>Waktu:</strong><br>
                        {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d M Y') }}
                        - {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('d M Y') }}
                    </p>
                    <hr>
                    <p class="text-justify">{{ $agenda->deskripsi }}</p>
                    <a href="{{ route('agenda') }}" class="btn btn-outline-secondary mt-3">
                        <i class="fa fa-arrow-left"></i> Kembali ke Daftar Agenda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
