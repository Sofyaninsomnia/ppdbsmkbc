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
        Schema::create('casis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nisn')->unique();
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('alamat');
            $table->string('agama');
            $table->unsignedBigInteger('ayah_id');
            $table->unsignedBigInteger('ibu_id');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->unsignedBigInteger('jurusan_id');
            $table->string('asal_sekolah');
            $table->string('no_hp');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ayah_id')->references('id')->on('ortu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ibu_id')->references('id')->on('ortu')->onDelete('cascade')->onUpdate('cascade');
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
