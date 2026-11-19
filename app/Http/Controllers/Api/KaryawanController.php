<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KaryawanRequest;
use App\Http\Resources\KaryawanResource;
use App\Models\Karyawan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class KaryawanController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $search = trim((string) $request->query('search', ''));

        $karyawan = Karyawan::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('departemen', 'like', "%{$search}%")
                        ->orWhere('jabatan', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return KaryawanResource::collection($karyawan);
    }

    public function store(KaryawanRequest $request): JsonResponse
    {
        $karyawan = Karyawan::create($request->validated());

        return response()->json([
            'message' => 'Data karyawan berhasil ditambahkan.',
            'data' => new KaryawanResource($karyawan),
        ], 201);
    }

    public function show(Karyawan $karyawan): KaryawanResource
    {
        return new KaryawanResource($karyawan);
    }

    public function update(KaryawanRequest $request, Karyawan $karyawan): JsonResponse
    {
        $karyawan->update($request->validated());

        return response()->json([
            'message' => 'Data karyawan berhasil diperbarui.',
            'data' => new KaryawanResource($karyawan),
        ]);
    }

    public function destroy(Karyawan $karyawan): JsonResponse
    {
        $karyawan->delete();

        return response()->json([
            'message' => 'Data karyawan berhasil dihapus.',
        ]);
    }
}
