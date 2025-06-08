    @extends('layouts.app') {{-- Asumsi layout admin Anda --}}

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Manajemen Data Budaya</h2>
                <a href="{{ route('admin.budaya.create') }}" class="btn btn-primary mb-3">Tambah Data Budaya</a>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- FORM FILTER --}}
                <div class="card mb-3">
                    <div class="card-header">
                        Filter Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.budaya.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2 mb-2">
                                <label for="category_id" class="mr-2">Kategori:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
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
                            <button type="submit" class="btn btn-info mb-2">Filter</button>
                            <a href="{{ route('admin.budaya.index') }}" class="btn btn-secondary mb-2 ml-2">Reset Filter</a>
                        </form>
                    </div>
                </div>
                {{-- AKHIR FORM FILTER --}}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Objek</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($budaya as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->category->name ?? 'Tidak Ada' }}</td>
                                <td>{{ $item->nama_objek }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_objek }}" width="100">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>{{ Str::limit($item->deskripsi, 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.budaya.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.budaya.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data budaya.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $budaya->appends(request()->except('page'))->links() }} {{-- Pastikan parameter filter tetap ada saat paginasi --}}
                </div>
            </div>
        </div>
    </div>
    @endsection
