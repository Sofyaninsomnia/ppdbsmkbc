<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Casis extends Model
{
    protected $table = 'casis';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'asal_sekolah',
        'jurusan'
    ];
}
