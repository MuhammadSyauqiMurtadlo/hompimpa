<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KaryawanResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'nama_lengkap' => $this->nama_lengkap,
            'email' => $this->email,
            'no_telepon' => $this->no_telepon,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir?->format('Y-m-d'),
            'alamat' => $this->alamat,
            'departemen' => $this->departemen,
            'jabatan' => $this->jabatan,
            'status_karyawan' => $this->status_karyawan,
            'tanggal_masuk' => $this->tanggal_masuk?->format('Y-m-d'),
            'gaji_pokok' => (int) $this->gaji_pokok,
        ];
    }
}
