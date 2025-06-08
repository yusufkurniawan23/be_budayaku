@extends('layouts.app') {{-- Asumsi layout admin Anda --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edit Data Budaya</h2>
            <form action="{{ route('admin.budaya.update', $budaya->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id', $budaya->category_id) == $category->id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_objek" class="form-label">Nama Objek</label>
                    <input type="text" class="form-control @error('nama_objek') is-invalid @enderror" id="nama_objek" name="nama_objek" value="{{ old('nama_objek', $budaya->nama_objek) }}">
                    @error('nama_objek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $budaya->tanggal) }}">
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Saat Ini</label><br>
                    @if ($budaya->foto)
                        <img src="{{ asset('storage/' . $budaya->foto) }}" alt="{{ $budaya->nama_objek }}" width="200"><br>
                    @else
                        Tidak ada foto saat ini.<br>
                    @endif
                    <label for="foto" class="form-label mt-2">Ganti Foto (Opsional)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="5">{{ old('deskripsi', $budaya->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.budaya.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
