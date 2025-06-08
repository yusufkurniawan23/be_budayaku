<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // 2. Simpan Data ke Database
        $contact = Contact::create($validatedData);

        // 3. Kirim Notifikasi WhatsApp
        $phoneNumberDinas = '+6281234567890'; // Ganti dengan nomor dinas kebudayaan Anda
        $message = "Halo Admin Dinas Kebudayaan, ada pesan baru dari form kontak website:\n\n";
        $message .= "Nama: " . $contact->name . "\n";
        $message .= "Telepon: " . $contact->phone . "\n";
        if ($contact->email) {
            $message .= "Email: " . $contact->email . "\n";
        }
        if ($contact->service) {
            $message .= "Layanan Diminta: " . $contact->service . "\n";
        }
        $message .= "Pesan: " . $contact->message;

        // Encode pesan agar sesuai dengan URL WhatsApp
        $encodedMessage = urlencode($message);

        // Link WhatsApp (akan membuka aplikasi WhatsApp)
        $whatsappLink = "https://wa.me/{$phoneNumberDinas}?text={$encodedMessage}";

        // Redirect ke link WhatsApp (ini akan membuka WhatsApp di browser atau aplikasi)
        // Opsi ini akan mengarahkan pengguna langsung ke WhatsApp setelah submit form.
        // Jika Anda ingin notifikasi hanya masuk ke admin tanpa mengarahkan user,
        // Anda perlu menggunakan API WhatsApp Business atau layanan pihak ketiga
        // yang mengirim pesan langsung tanpa interaksi user.
        return redirect($whatsappLink)->with('success', 'Pesan Anda telah terkirim!');
    }

    // Metode untuk menampilkan daftar kontak di dashboard admin
    public function index(Request $request)
    {
        // Mulai dengan query dasar, diurutkan berdasarkan tanggal terbaru
        $query = Contact::orderBy('created_at', 'desc');

        // Filter berdasarkan pencarian teks
        if ($request->filled('search') && $request->filled('filter_by')) {
            $search = $request->search;
            $filterBy = $request->filter_by;

            // Pastikan filter_by adalah kolom yang valid
            $validColumns = ['name', 'phone', 'email', 'service', 'message'];
            if (in_array($filterBy, $validColumns)) {
                $query->where($filterBy, 'like', '%' . $search . '%');
            }
        }

        // Filter berdasarkan rentang tanggal dibuat (created_at)
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Terapkan paginasi
        $contacts = $query->paginate(10); // Menggunakan paginasi 10 item per halaman

        return view('admin.contacts.index', compact('contacts'));
    }
}
