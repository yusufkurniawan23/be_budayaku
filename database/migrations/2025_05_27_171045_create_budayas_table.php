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
        Schema::create('budayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null'); // Menggunakan category_id
            $table->date('tanggal');
            $table->string('foto')->nullable();
            $table->text('deskripsi');
            $table->string('nama_objek'); // Ganti jenis_kebudayaan menjadi nama_objek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budayas');
    }
};
