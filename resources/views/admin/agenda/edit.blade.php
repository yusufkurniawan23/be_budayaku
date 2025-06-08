@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Data Agenda</h2>
    <form action="{{ route('admin.agenda.update', $agenda->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $agenda->judul }}" required>
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $agenda->lokasi }}" required>
        </div>
        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ $agenda->tanggal_mulai }}" required>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ $agenda->tanggal_selesai }}" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required>{{ $agenda->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
