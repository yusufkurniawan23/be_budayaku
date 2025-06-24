<?php

namespace App\Http\Controllers\Api;

use App\Models\Seniman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return response()->json($request->user());
    }
    
    public function update(Request $request)
    {
        $user = $request->user();
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'alamat' => 'required|string',
            'current_password' => 'nullable|required_with:password|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
            return response()->json(['errors' => ['current_password' => ['Current password is incorrect']]], 422);
        }
        
        $data = $request->only(['name', 'email', 'alamat']);
        
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        
        $user->update($data);
        
        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user
        ]);
    }
    
    public function getUserPosts(Request $request)
    {
        $seniman = Seniman::where('user_id', $request->user()->id)->paginate(10);
        
        return response()->json($seniman);
    }
    
    public function storePost(Request $request)
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
        $data['user_id'] = $request->user()->id;
        
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('seniman', 'public');
            $data['foto'] = $path;
        }
        
        $seniman = Seniman::create($data);
        
        return response()->json([
            'message' => 'Seniman post created successfully',
            'data' => $seniman
        ], 201);
    }
    
    public function updatePost(Request $request, $id)
    {
        $seniman = Seniman::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();
        
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
            'message' => 'Seniman post updated successfully',
            'data' => $seniman
        ]);
    }
    
    public function deletePost(Request $request, $id)
    {
        $seniman = Seniman::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();
        
        if ($seniman->foto && Storage::disk('public')->exists($seniman->foto)) {
            Storage::disk('public')->delete($seniman->foto);
        }
        
        $seniman->delete();
        
        return response()->json([
            'message' => 'Seniman post deleted successfully'
        ]);
    }
}