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
        Schema::table('ortu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('pekerjaan');
            $table->enum('jenis_kelamin', ['laki-Laki', 'perempuan']);
            $table->text('alamat');
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
