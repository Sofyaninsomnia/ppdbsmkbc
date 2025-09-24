<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Casis;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;

class Calon_siswa extends Controller
{
    public function form_casis(){
        return view('user.calon_siswa.index');
    }

    public function form_tahap_2(){
        $jurusan = Jurusan::all();
        $casis = Casis::where('user_id', Auth::id())->first();
        $user = Casis::where('user_id', Auth::id())->exists();
        return view('user.tahap_2', compact('jurusan', 'casis', 'user'));
    }

    public function create(){
        
    }
}
