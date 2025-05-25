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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('asal_sekolah');
            $table->enum('jenis_kelamin', ['laki_laki', 'perempuan']);
            $table->unsignedBigInteger('jurusan_id');
            $table->string('no_hp');
            $table->string('pas_foto')->nullable()->change();
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
