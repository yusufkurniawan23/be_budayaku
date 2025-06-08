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
    
    public function store(Request $request)
    {
        Log::info('Creating new agenda', $request->all());
        
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string',
            'lokasi' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            Log::warning('Agenda validation failed', ['errors' => $validator->errors()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $agenda = Agenda::create($request->all());
        
        Log::info('Agenda created successfully', ['agenda_id' => $agenda->id]);
        return response()->json([
            'message' => 'Agenda created successfully',
            'data' => $agenda
        ], 201);
    }
    
    public function update(Request $request, $id)
    {
        Log::info('Updating agenda', ['id' => $id, 'data' => $request->all()]);
        
        try {
            $agenda = Agenda::findOrFail($id);
            
            $validator = Validator::make($request->all(), [
                'judul' => 'required|string',
                'lokasi' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'deskripsi' => 'required|string',
            ]);
            
            if ($validator->fails()) {
                Log::warning('Agenda update validation failed', ['id' => $id, 'errors' => $validator->errors()]);
                return response()->json(['errors' => $validator->errors()], 422);
            }
            
            $agenda->update($request->all());
            
            Log::info('Agenda updated successfully', ['agenda_id' => $agenda->id]);
            return response()->json([
                'message' => 'Agenda updated successfully',
                'data' => $agenda
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to update agenda', ['id' => $id, 'error' => $e->getMessage()]);
            throw $e;
        }
    }
    
    public function destroy($id)
    {
        Log::info('Deleting agenda', ['id' => $id]);
        
        try {
            $agenda = Agenda::findOrFail($id);
            $agenda->delete();
            
            Log::info('Agenda deleted successfully', ['id' => $id]);
            return response()->json([
                'message' => 'Agenda deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to delete agenda', ['id' => $id, 'error' => $e->getMessage()]);
            throw $e;
        }
    }
}