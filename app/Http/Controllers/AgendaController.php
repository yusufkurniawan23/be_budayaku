<?php
namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // FRONTEND
    public function showFrontend()
    {
        $agenda = Agenda::latest()->paginate(6);
        return view('frontend.agenda', compact('agenda'));
    }

    public function detail($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('frontend.agenda_detail', compact('agenda'));
    }

    // BACKEND
    public function index(Request $request)
    {
        // Mulai dengan query dasar
        $query = Agenda::latest();

        // Filter berdasarkan pencarian teks
        if ($request->filled('search') && $request->filled('filter_by')) {
            $search = $request->search;
            $filterBy = $request->filter_by;

            // Pastikan filter_by adalah kolom yang valid
            $validColumns = ['judul', 'lokasi', 'deskripsi'];
            if (in_array($filterBy, $validColumns)) {
                $query->where($filterBy, 'like', '%' . $search . '%');
            }
        }

        // Filter berdasarkan rentang tanggal mulai
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal_mulai', '>=', $request->start_date);
        }

        // Filter berdasarkan rentang tanggal selesai
        if ($request->filled('end_date')) {
            $query->whereDate('tanggal_selesai', '<=', $request->end_date);
        }

        $agenda = $query->paginate(10);
        return view('admin.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
        ]);

        Agenda::create($validated);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($validated);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Agenda::destroy($id);
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus!');
    }
}
