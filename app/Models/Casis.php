<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casis extends Model
{
    use HasFactory;

    protected $table = 'casis';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'asal_sekolah',
        'jurusan'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
