<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
        'nama_jurusan',
    ];

    public function info()
    {
        return $this->hasOne(InfoJurusan::class);
    }

    public function daftar()
    {
        return $this->hasOne(Pendaftaran::class);
    }

    public function casis()
    {
        return $this->hasOne(Casis::class);
    }

}
