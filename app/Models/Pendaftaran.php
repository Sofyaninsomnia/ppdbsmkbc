<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $fillable = [
        'nisn',
        'nama_lengkap',
        'asal_sekolah',
        'jenis_kelamin',
        'jurusan_id',
        'no_hp',
        'pas_foto',
        'kode_aktivasi',
    ];

    public function jurusan()
    {

        return $this->belongsTo(Jurusan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
