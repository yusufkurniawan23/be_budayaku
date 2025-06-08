@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Seniman</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.seniman.update', $seniman->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $seniman->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $seniman->alamat) }}" required>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Karya</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $seniman->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="nomor" name="nomor" value="{{ old('nomor', $seniman->nomor) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi', $seniman->deskripsi) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Karya</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            @if($seniman->foto)
                <small class="form-text text-muted">Foto saat ini:</small><br>
                <img src="{{ asset('storage/' . $seniman->foto) }}" alt="{{ $seniman->judul }}" width="150" class="mt-2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('admin.seniman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
