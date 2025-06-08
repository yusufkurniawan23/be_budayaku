<?php

namespace App\Http\Controllers;

use App\Models\Seniman;
use Illuminate\Http\Request;

class SenimanPublicController extends Controller
{
    /**
     * Menampilkan daftar seniman dengan fitur pencarian berdasarkan waktu upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Seniman::latest(); // Mulai dengan query terbaru

        // Filter berdasarkan tahun
        if ($request->has('year') && $request->year != '') {
            $query->whereYear('created_at', $request->year);
        }

        // Filter berdasarkan bulan
        if ($request->has('month') && $request->month != '') {
            $query->whereMonth('created_at', $request->month);
        }

        // Filter berdasarkan tanggal (hari)
        if ($request->has('date') && $request->date != '') {
            $query->whereDay('created_at', $request->date);
        }

        // Filter berdasarkan keyword pencarian (nama, judul, deskripsi, alamat)
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nama', 'like', '%' . $searchTerm . '%')
                  ->orWhere('judul', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%')
                  ->orWhere('alamat', 'like', '%' . $searchTerm . '%');
            });
        }


        $seniman = $query->paginate(9)->appends($request->query()); // Paginasi dan tambahkan parameter query ke link

        return view('frontend.seniman', compact('seniman'));
    }

    /**
     * Menampilkan detail satu seniman.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $seniman = Seniman::findOrFail($id);
        return view('profile.seniman.show', compact('seniman'));
    }
}
