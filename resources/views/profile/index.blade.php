<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* Using container-fluid directly for full width */
        .card {
            border-radius: 1rem;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            margin-bottom: 2rem;
            border: none;
        }

        .card-header {
            background-image: linear-gradient(to right, #007bff, #0056b3);
            color: white;
            border-bottom: none;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            padding: 1.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }

        .profile-img {
            border: 5px solid #007bff;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.4);
            transition: all 0.3s ease-in-out;
        }

        .profile-img:hover {
            transform: scale(1.05);
            border-color: #0056b3;
        }

        .list-group-item {
            border-color: rgba(0, 0, 0, .085);
        }

        .btn-secondary,
        .btn-primary,
        .btn-success,
        .btn-warning,
        .btn-danger {
            transition: all 0.2s ease-in-out;
        }

        .btn-secondary:hover,
        .btn-primary:hover,
        .btn-success:hover,
        .btn-warning:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 2rem 0;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-5 mb-5">
        <div class="mb-4 text-center"> <a href="{{ route('layouts.homepage') }}"
                class="btn btn-lg btn-secondary px-5">Kembali ke Halaman Utama</a>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
                <div class="card">
                    <div class="card-header">{{ __('Profil Pengguna') }}</div>

                    <div class="card-body p-4 p-md-5">
                        @if (session('success'))
                            <div class="alert alert-success text-center">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @endif

                        <div class="col-md-4 text-center">
                            @if ($user->photo)
                                <img src="{{ Storage::url($user->photo) }}" alt="Foto Profil"
                                    class="img-fluid rounded-circle profile-img"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default_avatar.png') }}" alt="Foto Profil Default"
                                    class="img-fluid rounded-circle profile-img"
                                    style="width: 180px; height: 180px; object-fit: cover;">
                            @endif
                            <h4 class="mt-4 mb-1 text-primary">{{ $user->name }}</h4>
                            <p class="text-muted">{{ $user->email }}</p>
                            {{-- <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary mt-3 px-4">Edit Profil</a> --}}
                        </div>
                        <div class="col-md-8">
                            <h5 class="mb-3 text-info">Informasi Akun</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Nama:</strong>
                                    <span>{{ $user->name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Email:</strong>
                                    <span>{{ $user->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Alamat:</strong>
                                    <span>{{ $user->alamat }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Nomor:</strong>
                                    <span>{{ $user->nomor }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Role:</strong>
                                    <span class="badge bg-primary rounded-pill">{{ ucfirst($user->role) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <strong>Dibuat Pada:</strong>
                                    <span>{{ $user->created_at->format('d M Y') }}</span>
                                </li>
                            </ul>
                        </div>


                        <hr class="my-5">

                        <h3 class="mb-4 text-center text-primary">Postingan Seniman Anda</h3>
                        <div class="text-center mb-4">
                            <a href="{{ route('profile.seniman.create') }}" class="btn btn-lg btn-success px-5">Tambah
                                Postingan Seniman Baru</a>
                        </div>

                        @if ($seniman_posts->isEmpty())
                            <div class="alert alert-info text-center mt-4" role="alert">
                                Anda belum memiliki postingan seniman. Yuk, tambahkan sekarang!
                            </div>
                        @else
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach ($seniman_posts as $post)
                                    <div class="col">
                                        <div class="card h-100 shadow-sm">
                                            @if ($post->foto)
                                                <img src="{{ asset('storage/' . $post->foto) }}" class="card-img-top"
                                                    alt="{{ $post->judul }}"
                                                    style="height: 220px; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('images/default_seniman_image.png') }}"
                                                    class="card-img-top" alt="Gambar Default"
                                                    style="height: 220px; object-fit: cover;">
                                            @endif
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title text-truncate">{{ $post->judul }}</h5>
                                                <p class="card-text mb-1"><small
                                                        class="text-muted"><strong>Nama:</strong>
                                                        {{ $post->nama }}</small></p>
                                                <p class="card-text mb-1"><small
                                                        class="text-muted"><strong>Alamat:</strong>
                                                        {{ $post->alamat }}</small></p>
                                                <p class="card-text mb-2"><small
                                                        class="text-muted"><strong>Nomor:</strong>
                                                        {{ $post->nomor }}</small></p>
                                                <p class="card-text flex-grow-1">
                                                    {{ Str::limit($post->deskripsi, 100) }}</p>
                                                <div class="mt-auto d-flex justify-content-between">
                                                    <a href="{{ route('profile.seniman.edit', $post->id) }}"
                                                        class="btn btn-warning btn-sm flex-fill me-2">Edit</a>
                                                    <form action="{{ route('profile.seniman.delete', $post->id) }}"
                                                        method="POST" class="d-inline flex-fill">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm w-100"
                                                            onclick="return confirm('Yakin ingin menghapus postingan ini?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Nama Aplikasi Anda. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
