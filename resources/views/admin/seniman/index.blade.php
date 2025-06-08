@extends('layouts.app') {{-- Pastikan ini mengarah ke layout admin Anda --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Manajemen Data Seniman</h2>
                <a href="{{ route('admin.seniman.create') }}" class="btn btn-primary mb-3">Tambah Data Seniman</a>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                {{-- FORM FILTER --}}
                <div class="card mb-3">
                    <div class="card-header">
                        Filter Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.seniman.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2 mb-2">
                                <label for="search" class="sr-only">Cari:</label>
                                <input type="text" name="search" id="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                            </div>
                            <div class="form-group mr-2 mb-2">
                                <label for="filter_by" class="sr-only">Filter Berdasarkan:</label>
                                <select name="filter_by" id="filter_by" class="form-control">
                                    <option value="">Filter Berdasarkan</option>
                                    <option value="nama" {{ request('filter_by') == 'nama' ? 'selected' : '' }}>Nama</option>
                                    <option value="alamat" {{ request('filter_by') == 'alamat' ? 'selected' : '' }}>Alamat</option>
                                    <option value="judul" {{ request('filter_by') == 'judul' ? 'selected' : '' }}>Judul Karya</option>
                                    <option value="deskripsi" {{ request('filter_by') == 'deskripsi' ? 'selected' : '' }}>Deskripsi</option>
                                </select>
                            </div>
                            <button class="btn btn-info mb-2" type="submit">Cari</button>
                            <a href="{{ route('admin.seniman.index') }}" class="btn btn-secondary mb-2 ml-2">Reset Filter</a>
                        </form>
                    </div>
                </div>
                {{-- AKHIR FORM FILTER --}}

                {{-- Wrapper untuk tabel responsif --}}
                <div class="table-responsive">
                    <table class="table table-striped table-bordered"> {{-- table-responsive dipindahkan ke div wrapper --}}
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Judul</th>
                                <th>Nomor</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                {{-- <th>Diposting Oleh</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($seniman as $data)
                                <tr>
                                    <td>{{ $seniman->firstItem() + $loop->index }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->nomor }}</td>
                                    <td>{{ Str::limit($data->deskripsi, 50) }}</td>
                                    <td>
                                        @if ($data->foto)
                                            <img src="{{ asset('storage/' . $data->foto) }}" alt="{{ $data->judul }}" width="80">
                                        @else
                                            Tidak ada foto
                                        @endif
                                    </td>
                                    {{-- <td>{{ $data->user->name ?? 'N/A' }}</td> --}}
                                    <td>
                                        <a href="{{ route('admin.seniman.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.seniman.delete', $data->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data seniman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> {{-- Akhir dari table-responsive wrapper --}}

                <div class="d-flex justify-content-center">
                    {!! $seniman->appends(request()->query())->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
