<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        // Mulai dengan query dasar
        $query = Budaya::latest();

        // Filter berdasarkan kategori
        if ($request->filled('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        // Filter berdasarkan rentang tanggal
        if ($request->filled('start_date')) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $budaya = $query->paginate(10);
        $categories = Category::all(); // Ambil semua kategori untuk dropdown filter

        return view('admin.budaya.index', compact('budaya', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.budaya.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required|string',
            'nama_objek' => 'required|string|max:255'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-budaya', 'public');
        }

        Budaya::create($validated);
        return redirect()->route('admin.budaya.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $budaya = Budaya::findOrFail($id);
        $categories = Category::all();
        return view('admin.budaya.edit', compact('budaya', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $budaya = Budaya::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|max:2048',
            'deskripsi' => 'required|string',
            'nama_objek' => 'required|string|max:255'
        ]);

        if ($request->hasFile('foto')) {
            if ($budaya->foto && Storage::disk('public')->exists($budaya->foto)) {
                Storage::disk('public')->delete($budaya->foto);
            }
            $validated['foto'] = $request->file('foto')->store('foto-budaya', 'public');
        }

        $budaya->update($validated);
        return redirect()->route('admin.budaya.index')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $budaya = Budaya::findOrFail($id);
        if ($budaya->foto && Storage::disk('public')->exists($budaya->foto)) {
            Storage::disk('public')->delete($budaya->foto);
        }
        $budaya->delete();
        return redirect()->route('admin.budaya.index')->with('success', 'Data berhasil dihapus.');
    }

    public function budaya()
    {
        $cagarBudayaCategory = Category::where('name', 'Cagar Budaya')->first();
        $cagarAlamCategory = Category::where('name', 'Cagar Alam')->first();

        $cagarBudayas = collect();
        $cagarAlams = collect();

        if ($cagarBudayaCategory) {
            $cagarBudayas = $cagarBudayaCategory->budayas()->latest()->get();
        }

        if ($cagarAlamCategory) {
            $cagarAlams = $cagarAlamCategory->budayas()->latest()->get();
        }

        $budayas = Budaya::latest()->get();

        return view('frontend.budaya', compact('budayas', 'cagarBudayas', 'cagarAlams'));
    }

    public function cagarBudaya()
    {
        $category = Category::where('name', 'Cagar Budaya')->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori Cagar Budaya tidak ditemukan.');
        }
        $budayas = $category->budayas()->latest()->paginate(9);
        return view('frontend.cagar_budaya', compact('budayas'));
    }

    public function cagarAlam()
    {
        $category = Category::where('name', 'Cagar Alam')->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Kategori Cagar Alam tidak ditemukan.');
        }
        $budayas = $category->budayas()->latest()->paginate(9);
        return view('frontend.cagar_alam', compact('budayas'));
    }

    public function show($id)
    {
        $budaya = Budaya::findOrFail($id);
        return view('frontend.budaya_detail', compact('budaya'));
    }
}
