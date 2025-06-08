<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seniman; // Ganti Post menjadi Seniman
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Pastikan user sudah login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // Ambil data seniman yang diposting oleh user ini
        $seniman_posts = Seniman::where('user_id', $user->id)->latest()->get();
        return view('profile.index', compact('user', 'seniman_posts')); // Ubah nama variabel untuk lebih jelas
    }

    // Fungsi untuk menampilkan form tambah data seniman
    public function createSenimanPost()
    {
        return view('profile.seniman.create'); // Nama view baru untuk form posting seniman
    }

    // Fungsi untuk menyimpan data seniman yang diposting user
    public function storeSenimanPost(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'judul' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi untuk upload gambar
            'nomor' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $seniman = new Seniman();
        $seniman->user_id = Auth::id(); // Kaitkan dengan user yang sedang login
        $seniman->nama = $request->nama;
        $seniman->alamat = $request->alamat;
        $seniman->judul = $request->judul;
        $seniman->nomor = $request->nomor;
        $seniman->deskripsi = $request->deskripsi;

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('seniman_photos', 'public');
            $seniman->foto = $path;
        }

        $seniman->save();

        return redirect()->route('profile.index')->with('success', 'Postingan seniman berhasil ditambahkan.');
    }

    // Fungsi untuk mengedit postingan seniman oleh user
    public function editSenimanPost($id)
    {
        $seniman = Seniman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('profile.edit_seniman', compact('seniman'));
    }

    // Fungsi untuk memperbarui postingan seniman oleh user
    public function updateSenimanPost(Request $request, $id)
    {
        $seniman = Seniman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'judul' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nomor' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            if ($seniman->foto) {
                Storage::delete('public/' . $seniman->foto);
            }
            $path = $request->file('foto')->store('seniman_photos', 'public');
            $validated['foto'] = $path;
        }

        $seniman->update($validated);
        return redirect()->route('profile.index')->with('success', 'Postingan seniman berhasil diperbarui.');
    }

    // Fungsi untuk menghapus postingan seniman oleh user
    public function deleteSenimanPost($id)
    {
        $seniman = Seniman::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        if ($seniman->foto) {
            Storage::delete('public/' . $seniman->foto);
        }
        $seniman->delete();
        return redirect()->route('profile')->with('success', 'Postingan seniman berhasil dihapus.');
    }

    // Fungsi untuk mengedit profil user (nama, foto profil user)
    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user')); // Nama view baru
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Foto profil user, bukan foto seniman
        ]);

        $user->name = $request->name;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $path = $request->file('photo')->store('user_photos', 'public'); // Folder berbeda
            $user->photo = $path;
        }

        // $user->save();

        return redirect()->route('profile.index')->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
