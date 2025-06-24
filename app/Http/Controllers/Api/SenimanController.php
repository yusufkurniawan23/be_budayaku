<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seniman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SenimanController extends Controller
{
    public function index(Request $request)
    {
        Log::info('Fetching seniman with filters', $request->all());

        $query = Seniman::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
            });
        }


        if ($request->keahlian) {
            $query->where('judul', 'like', '%' . $request->keahlian . '%');
        }


        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        $perPage = $request->get('per_page', 10);
        $seniman = $query->paginate($perPage);

        $seniman->getCollection()->transform(function ($item) {
            $item->foto_url = $item->getFirstMediaUrl('foto') ?: null;
            unset($item->media);
            return $item;
        });

        return response()->json([
            'success' => true,
            'data' => $seniman->items(),
            'meta' => [
                'current_page' => $seniman->currentPage(),
                'last_page' => $seniman->lastPage(),
                'per_page' => $seniman->perPage(),
                'total' => $seniman->total(),
                'from' => $seniman->firstItem(),
                'to' => $seniman->lastItem()
            ]
        ]);
    }

    public function show($id)
    {
        Log::info('Showing seniman details', ['id' => $id]);

        try {
            $seniman = Seniman::findOrFail($id);

            $seniman->foto_url = $seniman->getFirstMediaUrl('foto') ?: null;

            unset($seniman->media);

            Log::info('Seniman details fetched successfully', ['id' => $id, 'nama' => $seniman->nama]);

            return response()->json([
                'success' => true,
                'data' => $seniman
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::warning('Seniman not found', ['id' => $id]);

            return response()->json([
                'success' => false,
                'message' => 'Data seniman tidak ditemukan'
            ], 404);
        } catch (\Exception $e) {
            Log::error('Failed to fetch seniman details', ['id' => $id, 'error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengambil data'
            ], 500);
        }
    }
}
