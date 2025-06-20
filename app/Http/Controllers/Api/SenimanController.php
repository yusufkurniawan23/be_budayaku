<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Models\Seniman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SenimanController extends Controller
{
    public function index(Request $request)
    {
        $query = Seniman::query();
        
        // Filtering
        if ($request->search) {
            $filter_by = $request->filter_by ?: 'nama';
            $query->where($filter_by, 'like', '%' . $request->search . '%');
        }
        
        // Year, month, date filtering (if applicable)
        if ($request->year) {
            $query->whereYear('created_at', $request->year);
        }
        
        if ($request->month) {
            $query->whereMonth('created_at', $request->month);
        }
        
        if ($request->date) {
            $query->whereDay('created_at', $request->date);
        }
        
        $seniman = $query->paginate(10);
        
        return response()->json($seniman);
    }
    
    public function show($id)
    {
        $seniman = Seniman::findOrFail($id);
        return response()->json($seniman);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'judul' => 'required|string',
            'nomor' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('seniman', 'public');
            $data['foto'] = $path;
        }
        
        $seniman = Seniman::create($data);
        
        return response()->json([
            'message' => 'Seniman created successfully',
            'data' => $seniman
        ], 201);
    }
    
    public function update(Request $request, $id)
    {
        $seniman = Seniman::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'judul' => 'required|string',
            'nomor' => 'required|string',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            // Delete old file if it exists
            if ($seniman->foto && Storage::disk('public')->exists($seniman->foto)) {
                Storage::disk('public')->delete($seniman->foto);
            }
            
            $path = $request->file('foto')->store('seniman', 'public');
            $data['foto'] = $path;
        }
        
        $seniman->update($data);
        
        return response()->json([
            'message' => 'Seniman updated successfully',
            'data' => $seniman
        ]);
    }
    
    public function destroy($id)
    {
        $seniman = Seniman::findOrFail($id);
        
        if ($seniman->foto && Storage::disk('public')->exists($seniman->foto)) {
            Storage::disk('public')->delete($seniman->foto);
        }
        
        $seniman->delete();
        
        return response()->json([
            'message' => 'Seniman deleted successfully'
        ]);
    }
}