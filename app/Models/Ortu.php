<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    use HasFactory;

    protected $table = 'ortu';
    protected $fillable = [
        'nik',
        'nama',
        'no_hp',
        'pekerjaan',
        'jenis_kelamin',
        'alamat',
    ];

    public function siswa(){
        return $this->hasMany(Casis::class);
    }
}
