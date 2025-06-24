<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Fetching agendas with filters', $request->all());

        $query = Agenda::query();

        // Search by title
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        // Date range filter
        if ($request->start_date) {
            $query->whereDate('tanggal_mulai', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('tanggal_selesai', '<=', $request->end_date);
        }

        $agenda = $query->paginate(10);

        Log::info('Agendas fetched successfully');
        return response()->json($agenda);
    }

    public function show($id)
    {
        Log::info('Showing agenda details', ['id' => $id]);

        try {
            $agenda = Agenda::findOrFail($id);
            return response()->json($agenda);
        } catch (\Exception $e) {
            Log::error('Failed to find agenda', ['id' => $id, 'error' => $e->getMessage()]);
            throw $e;
        }
    }
}
