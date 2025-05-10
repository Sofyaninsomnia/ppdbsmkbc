<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoJurusan extends Model
{
    use HasFactory;

    protected $table = 'info_jurusan';

    protected $fillable = [
        'jurusan_id',
        'deskripsi_singkat',
        'deskripsi',
        'logo',
        'foto_kegiatan',
    ];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
