<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Casis;
use App\Models\Jurusan;

class Calon_siswa extends Controller
{
    public function form_casis(){
        return view('user.calon_siswa.index');
    }

    public function form_tahap_2(){
        $jurusan = Jurusan::all();
        return view('user.calon_siswa.create', compact('jurusan'));
    }
}
