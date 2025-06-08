@extends('layouts.app') {{-- Menggunakan layout troweld Anda untuk halaman user --}}

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buat Postingan Seniman Baru') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Mengoreksi action route ke profile.store_post --}}
                    <form action="{{ route('profile.seniman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Seniman</label>
                            {{-- Mengisi otomatis dengan nama user yang login dan membuatnya readonly --}}
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->name ?? '' }}" readonly>
                            {{-- Tidak perlu @error karena field ini tidak bisa diubah user --}}
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            {{-- Mengisi otomatis dengan alamat user yang login dan membuatnya readonly --}}
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ Auth::user()->alamat ?? '' }}" readonly>
                            {{-- Tidak perlu @error karena field ini tidak bisa diubah user --}}
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Karya</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nomor" class="form-label">Nomor Telepon</label>
                            {{-- Mengisi otomatis dengan nomor telepon user yang login dan membuatnya readonly --}}
                            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ Auth::user()->nomor ?? '' }}" readonly>
                            {{-- Tidak perlu @error karena field ini tidak bisa diubah user --}}
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Karya</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Upload Foto Karya</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Posting Seniman</button>
                        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
