<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BudayaController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Fetching budaya with filters', $request->all());

        $query = Budaya::with('category');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_objek', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->category . '%');
            });
        }

        if ($request->start_date) {
            $query->whereDate('tanggal', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('tanggal', '<=', $request->end_date);
        }

        $sortBy = $request->get('sort_by', 'tanggal');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $perPage = $request->get('per_page', 10);
        $budaya = $query->paginate($perPage);

        $budaya->getCollection()->transform(function ($item) {
            $item->foto_url = $item->getFirstMediaUrl('foto') ?: null;

            unset($item->media);

            return $item;
        });

        Log::info('Budaya fetched successfully', ['count' => $budaya->count()]);

        return response()->json([
            'success' => true,
            'data' => $budaya->items(),
            'meta' => [
                'current_page' => $budaya->currentPage(),
                'last_page' => $budaya->lastPage(),
                'per_page' => $budaya->perPage(),
                'total' => $budaya->total(),
                'from' => $budaya->firstItem(),
                'to' => $budaya->lastItem()
            ]
        ]);
    }

    public function show($id)
    {
        Log::info('Showing budaya details', ['id' => $id]);

        try {
            $budaya = Budaya::with('category')->findOrFail($id);

            $budaya->foto_url = $budaya->getFirstMediaUrl('foto') ?: null;

            unset($budaya->media);

            Log::info('Budaya details fetched successfully', ['id' => $id, 'nama_objek' => $budaya->nama_objek]);

            return response()->json([
                'success' => true,
                'data' => $budaya
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('Budaya not found', ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Data budaya tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Failed to fetch budaya details', ['id' => $id, 'error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data'
            ], 500);
        }
    }
}
