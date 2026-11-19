<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawans = [
            [
                'nik' => '9900000000000001',
                'nama_lengkap' => 'Andi Pratama',
                'email' => 'andi.pratama@example.com',
                'no_telepon' => '081200000001',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1993-05-12',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'departemen' => 'Teknologi Informasi',
                'jabatan' => 'Software Engineer',
                'status_karyawan' => 'Tetap',
                'tanggal_masuk' => '2021-06-01',
                'gaji_pokok' => 8500000,
            ],
            [
                'nik' => '9900000000000002',
                'nama_lengkap' => 'Siti Rahmawati',
                'email' => 'siti.rahmawati@example.com',
                'no_telepon' => '081200000002',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1990-09-24',
                'alamat' => 'Jl. Melati No. 25, Jakarta',
                'departemen' => 'Keuangan',
                'jabatan' => 'Akuntan',
                'status_karyawan' => 'Tetap',
                'tanggal_masuk' => '2020-03-16',
                'gaji_pokok' => 7800000,
            ],
            [
                'nik' => '9900000000000003',
                'nama_lengkap' => 'Budi Santoso',
                'email' => 'budi.santoso@example.com',
                'no_telepon' => '081200000003',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1995-01-08',
                'alamat' => 'Jl. Kenanga No. 8, Jakarta',
                'departemen' => 'Operasional',
                'jabatan' => 'Staf Operasional',
                'status_karyawan' => 'Kontrak',
                'tanggal_masuk' => '2024-02-01',
                'gaji_pokok' => 6200000,
            ],
            [
                'nik' => '9900000000000004',
                'nama_lengkap' => 'Dewi Anggraini',
                'email' => 'dewi.anggraini@example.com',
                'no_telepon' => '081200000004',
                'jenis_kelamin' => 'Perempuan',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1997-11-30',
                'alamat' => 'Jl. Cempaka No. 14, Jakarta',
                'departemen' => 'Sumber Daya Manusia',
                'jabatan' => 'HR Officer',
                'status_karyawan' => 'Tetap',
                'tanggal_masuk' => '2022-08-15',
                'gaji_pokok' => 7000000,
            ],
            [
                'nik' => '9900000000000005',
                'nama_lengkap' => 'Rizky Maulana',
                'email' => 'rizky.maulana@example.com',
                'no_telepon' => '081200000005',
                'jenis_kelamin' => 'Laki-laki',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2000-07-19',
                'alamat' => 'Jl. Anggrek No. 3, Jakarta',
                'departemen' => 'Pemasaran',
                'jabatan' => 'Marketing Associate',
                'status_karyawan' => 'Magang',
                'tanggal_masuk' => '2025-01-06',
                'gaji_pokok' => 4500000,
            ],
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::query()->firstOrCreate(
                ['nik' => $karyawan['nik']],
                $karyawan,
            );
        }
    }
}
