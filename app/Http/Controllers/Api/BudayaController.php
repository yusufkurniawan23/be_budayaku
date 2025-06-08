<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        $query = Budaya::with('category');
        
        // Filter by category
        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        
        // Date range filter
        if ($request->start_date) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }
        
        if ($request->end_date) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }
        
        $budaya = $query->paginate(10);
        
        return response()->json($budaya);
    }
    
    public function show($id)
    {
        $budaya = Budaya::with('category')->findOrFail($id);
        return response()->json($budaya);
    }
    
    public function cagarBudaya()
    {
        // Assuming category_id 1 is for cagar budaya
        $budaya = Budaya::where('category_id', 1)->paginate(10);
        return response()->json($budaya);
    }
    
    public function cagarAlam()
    {
        // Assuming category_id 2 is for cagar alam
        $budaya = Budaya::where('category_id', 2)->paginate(10);
        return response()->json($budaya);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'nama_objek' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('budaya', 'public');
            $data['foto'] = $path;
        }
        
        $budaya = Budaya::create($data);
        
        return response()->json([
            'message' => 'Budaya data created successfully',
            'data' => $budaya
        ], 201);
    }
    
    public function update(Request $request, $id)
    {
        $budaya = Budaya::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'nama_objek' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $data = $request->all();
        
        if ($request->hasFile('foto')) {
            // Delete old file if it exists
            if ($budaya->foto && Storage::disk('public')->exists($budaya->foto)) {
                Storage::disk('public')->delete($budaya->foto);
            }
            
            $path = $request->file('foto')->store('budaya', 'public');
            $data['foto'] = $path;
        }
        
        $budaya->update($data);
        
        return response()->json([
            'message' => 'Budaya data updated successfully',
            'data' => $budaya
        ]);
    }
    
    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        
        if ($budaya->foto && Storage::disk('public')->exists($budaya->foto)) {
            Storage::disk('public')->delete($budaya->foto);
        }
        
        $budaya->delete();
        
        return response()->json([
            'message' => 'Budaya data deleted successfully'
        ]);
    }
}