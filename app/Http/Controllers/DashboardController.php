<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Budaya;
use App\Models\Contact;
use App\Models\Seniman; // Pastikan model Seniman sudah ada dan di-import
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin dengan jumlah data.
     */
    public function index()
    {
        // Ambil jumlah data dari masing-masing model
        $totalSeniman = Seniman::count();
        $totalBudaya = Budaya::count();
        $totalAgenda = Agenda::count();
        $totalKontak = Contact::count();

        // Kirim data jumlah ke view
        return view('admin.dashboard', compact('totalSeniman', 'totalBudaya', 'totalAgenda', 'totalKontak'));
    }
}
