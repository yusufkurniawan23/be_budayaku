@extends('layouts.app') {{-- Asumsikan Anda memiliki layout admin --}}

@section('content')
    <div class="container-fluid">

        <h1 class="mb-4">Daftar Kontak</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- FORM FILTER --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Filter Data Pesan Kontak</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contacts.index') }}" method="GET" class="form-inline">
                    <div class="form-group mr-2 mb-2">
                        <label for="search" class="sr-only">Cari:</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                    </div>
                    <div class="form-group mr-2 mb-2">
                        <label for="filter_by" class="sr-only">Filter Berdasarkan:</label>
                        <select name="filter_by" id="filter_by" class="form-control">
                            <option value="">Filter Berdasarkan</option>
                            <option value="name" {{ request('filter_by') == 'name' ? 'selected' : '' }}>Nama</option>
                            <option value="phone" {{ request('filter_by') == 'phone' ? 'selected' : '' }}>Telepon</option>
                            <option value="email" {{ request('filter_by') == 'email' ? 'selected' : '' }}>Email</option>
                            <option value="service" {{ request('filter_by') == 'service' ? 'selected' : '' }}>Layanan</option>
                            <option value="message" {{ request('filter_by') == 'message' ? 'selected' : '' }}>Pesan</option>
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
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mb-2 ml-2">Reset Filter</a>
                </form>
            </div>
        </div>
        {{-- AKHIR FORM FILTER --}}

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pesan Kontak</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" width="100%" cellspacing="0"> {{-- Tambahkan table-striped --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Layanan</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact) {{-- Gunakan @forelse untuk menangani data kosong --}}
                                <tr>
                                    <td>{{ $contacts->firstItem() + $loop->index }}</td> {{-- Menggunakan paginasi untuk nomor urut --}}
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email ?? '-' }}</td>
                                    <td>{{ $contact->service ?? '-' }}</td>
                                    <td>{{ Str::limit($contact->message, 100) }}</td> {{-- Batasi panjang pesan --}}
                                    <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data kontak.</td> {{-- Sesuaikan colspan --}}
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{-- Pastikan link paginasi menyertakan parameter query filter --}}
                    {!! $contacts->appends(request()->query())->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
