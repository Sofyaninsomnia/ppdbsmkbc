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
        // Contoh (Re)-Migrasi yang Benar
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID pengguna
            $table->string('type'); // Kolom untuk menyimpan jenis: 'ijazah', 'akta', 'kk', atau 'rapot'
            $table->string('file_name');
            $table->string('path'); // Kolom untuk menyimpan path file di storage
            $table->string('status')->default('pending'); // Status pemrosesan
            $table->string('batch_id')->nullable(); // Untuk tracking batch
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
