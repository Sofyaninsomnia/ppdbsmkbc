<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casis extends Model
{
    use HasFactory;

    protected $table = 'casis';

    protected $fillable = [
        'nisn',
        'nama',
        'ttl',
        'alamat',
        'agama',
        'jenis_kelamin',
        'asal_sekolah',
        'foto',
        'no_hp',
        'jurusan_id',
        'user_id'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function ortu()
    {
        return $this->belongsTo(Ortu::class);
    }

    public function ayah()
    {
        return $this->belongsTo(Ortu::class, 'ayah_id');
    }

    public function ibu()
    {
        return $this->belongsTo(Ortu::class, 'ibu_id');
    }


}
