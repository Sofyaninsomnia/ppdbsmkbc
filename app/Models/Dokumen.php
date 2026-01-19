<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $table = 'document';
    protected $fillable = [
        'user_id',
        'type',
        'file_name', // Tambahkan ini agar lebih informatif
        'path',      // WAJIB: Path tempat file disimpan
        'status',
        'batch_id',
        'casis_id'
    ];
}
