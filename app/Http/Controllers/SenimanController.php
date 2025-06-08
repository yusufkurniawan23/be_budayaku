<?php

namespace App\Http\Controllers;

use App\Models\Seniman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk manajemen file

class SenimanController extends Controller
{
    // Hanya admin yang bisa mengakses ini
    // public function __construct()
    // {
    //     $this->middleware('auth'); // Pastikan sudah login
    //     $this->middleware('admin'); // Middleware untuk role admin
    // }

    public function index(Request $request)
    {
        $query = Seniman::query();

        // Ambil parameter pencarian dan filter dari request
        $search = $request->input('search');
        $filterBy = $request->input('filter_by');

        // Terapkan filter jika ada parameter pencarian
        if ($search) {
            // Jika filterBy tidak ditentukan, cari di semua kolom yang relevan
            if (empty($filterBy) || !in_array($filterBy, ['nama', 'alamat', 'judul', 'deskripsi'])) {
                $query->where(function($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('alamat', 'like', '%' . $search . '%')
                      ->orWhere('judul', 'like', '%' . $search . '%')
                      ->orWhere('deskripsi', 'like', '%' . $search . '%');
                });
            } else {
                // Jika filterBy ditentukan, cari hanya di kolom tersebut
                $query->where($filterBy, 'like', '%' . $search . '%');
            }
        }

        // Eager load relasi 'user' untuk menampilkan nama pengguna yang memposting (jika diperlukan)
        // $seniman = $query->with('user')->paginate(10);
        $seniman = $query->paginate(10); // Menampilkan data halaman, bisa disesuaikan

        return view('admin.seniman.index', compact('seniman'));
    }

    // Fungsi create dan store di SenimanController ini tidak lagi digunakan
    // karena posting dilakukan dari sisi user profile

    public function edit($id)
    {
        // Eager load relasi 'user' saat mengedit
        $seniman = Seniman::with('user')->findOrFail($id);
        return view('admin.seniman.edit', compact('seniman'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'judul' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Ubah ke image validation
            'nomor' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $seniman = Seniman::findOrFail($id);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($seniman->foto) {
                Storage::delete('public/' . $seniman->foto);
            }
            $path = $request->file('foto')->store('seniman_photos', 'public');
            $validated['foto'] = $path;
        }

        $seniman->update($validated);
        return redirect()->route('admin.seniman.index')->with('success', 'Data seniman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $seniman = Seniman::findOrFail($id);
        if ($seniman->foto) {
            Storage::delete('public/' . $seniman->foto); // Hapus file foto juga
        }
        $seniman->delete(); // Menggunakan delete() setelah findOrFail
        return redirect()->route('admin.seniman.index')->with('success', 'Data seniman berhasil dihapus.');
    }
}
