<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Search and filtering
        if ($request->search && $request->filter_by) {
            $query->where($request->filter_by, 'like', '%' . $request->search . '%');
        }
        
        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return response()->json($contacts);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $contact = Contact::create($request->all());
        
        return response()->json([
            'message' => 'Contact message sent successfully',
            'data' => $contact
        ], 201);
    }
}