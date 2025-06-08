@extends('layouts.app') {{-- Pastikan ini sesuai layout milikmu --}}

@section('content')
<div class="container">
    <h2>Tambah Data Seniman</h2>

    {{-- Tampilkan validasi error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.seniman.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Seniman</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
        </div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Karya</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto (URL atau Path)</label>
            <input type="file" name="foto" class="form-control" value="{{ old('foto') }}">
        </div>

        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Kontak</label>
            <input type="text" name="nomor" class="form-control" value="{{ old('nomor') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.seniman.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
