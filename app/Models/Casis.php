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
        'tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'asal_sekolah',
        'foto',
        'jurusan_id'
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
