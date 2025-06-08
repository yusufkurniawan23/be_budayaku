@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Daftar Agenda</h1>
    <a href="{{ route('admin.agenda.create') }}" class="btn btn-primary mb-3">Tambah Agenda Baru</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- FORM FILTER --}}
    <div class="card mb-3">
        <div class="card-header">
            Filter Data
        </div>
        <div class="card-body">
            <form action="{{ route('admin.agenda.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-2 mb-2">
                    <label for="search" class="sr-only">Cari:</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                </div>
                <div class="form-group mr-2 mb-2">
                    <label for="filter_by" class="sr-only">Filter Berdasarkan:</label>
                    <select name="filter_by" id="filter_by" class="form-control">
                        <option value="">Filter Berdasarkan</option>
                        <option value="judul" {{ request('filter_by') == 'judul' ? 'selected' : '' }}>Judul</option>
                        <option value="lokasi" {{ request('filter_by') == 'lokasi' ? 'selected' : '' }}>Lokasi</option>
                        <option value="deskripsi" {{ request('filter_by') == 'deskripsi' ? 'selected' : '' }}>Deskripsi</option>
                    </select>
                </div>
                <div class="form-group mr-2 mb-2">
                    <label for="start_date" class="mr-2">Dari Tanggal:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="form-group mr-2 mb-2">
                    <label for="end_date" class="mr-2">Sampai Tanggal:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <button class="btn btn-info mb-2" type="submit">Cari</button>
                <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary mb-2 ml-2">Reset Filter</a>
            </form>
        </div>
    </div>
    {{-- AKHIR FORM FILTER --}}

    {{-- Wrapper untuk tabel responsif --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Lokasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($agenda as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td> {{-- Menggunakan $loop->iteration untuk nomor urut --}}
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->lokasi }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                    <td>
                        <a href="{{ route('admin.agenda.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.agenda.delete', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus agenda ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada agenda.</td> {{-- Sesuaikan colspan dengan jumlah kolom --}}
                </tr>
                @endforelse
            </tbody>
        </table>
    </div> {{-- Akhir dari table-responsive wrapper --}}

    <div class="d-flex justify-content-center">
        {{-- Pastikan link paginasi menyertakan parameter query filter --}}
        {!! $agenda->appends(request()->query())->links() !!}
    </div>
</div>
@endsection
