<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20)->unique();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('no_telepon', 20);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir');
            $table->text('alamat')->nullable();
            $table->string('departemen', 100);
            $table->string('jabatan', 100);
            $table->enum('status_karyawan', ['Tetap', 'Kontrak', 'Magang']);
            $table->date('tanggal_masuk');
            $table->unsignedBigInteger('gaji_pokok')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
