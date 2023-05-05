<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('nama_lengkap')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->string('kebangsaan')->nullable();
            $table->string('alamat_pribadi')->nullable();
            $table->string('kontak_pribadi')->nullable();
            $table->string('pendidikan_pribadi')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('jabatan_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('telepon_perusahaan')->nullable();
            $table->string('scan_ktp')->nullable();
            $table->string('scan_cv')->nullable();
            $table->string('scan_uraian_tugas')->nullable();
            $table->string('scan_sk_pengangkatan')->nullable();
            $table->string('scan_ttd_pribadi')->nullable();
            $table->enum('is_active', ['y', 'n'])->default('y');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('level', ['1', '2', '3'])->default('1');
            $table->string('image')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
