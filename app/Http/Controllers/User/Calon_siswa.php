<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Casis;

class Calon_siswa extends Controller
{
    public function form_casis(){
        return view('user.calon_siswa.index');
    }
}
