<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Saat update, route('karyawan') berisi model; saat store bernilai null.
        $id = $this->route('karyawan')?->id;

        return [
            'nik' => ['required', 'string', 'max:20', Rule::unique('karyawans', 'nik')->ignore($id)],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('karyawans', 'email')->ignore($id)],
            'no_telepon' => ['required', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['required', 'date', 'before:today'],
            'alamat' => ['nullable', 'string'],
            'departemen' => ['required', 'string', 'max:100'],
            'jabatan' => ['required', 'string', 'max:100'],
            'status_karyawan' => ['required', Rule::in(['Tetap', 'Kontrak', 'Magang'])],
            'tanggal_masuk' => ['required', 'date'],
            'gaji_pokok' => ['required', 'integer', 'min:0'],
        ];
    }

    public function attributes(): array
    {
        return [
            'nik' => 'NIK',
            'nama_lengkap' => 'Nama lengkap',
            'email' => 'Email',
            'no_telepon' => 'No. telepon',
            'jenis_kelamin' => 'Jenis kelamin',
            'tempat_lahir' => 'Tempat lahir',
            'tanggal_lahir' => 'Tanggal lahir',
            'alamat' => 'Alamat',
            'departemen' => 'Departemen',
            'jabatan' => 'Jabatan',
            'status_karyawan' => 'Status karyawan',
            'tanggal_masuk' => 'Tanggal masuk',
            'gaji_pokok' => 'Gaji pokok',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'max' => ':attribute maksimal :max karakter.',
            'min' => ':attribute minimal :min.',
            'email' => 'Format :attribute tidak valid.',
            'unique' => ':attribute sudah digunakan.',
            'in' => ':attribute yang dipilih tidak valid.',
            'date' => ':attribute bukan tanggal yang valid.',
            'integer' => ':attribute harus berupa angka bulat.',
            'before' => ':attribute harus sebelum hari ini.',
            'regex' => 'Format :attribute tidak valid.',
        ];
    }
}
