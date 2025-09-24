<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrtuController extends Controller
{
    public function index(){
        return view('user.ortu');
    }

    public function ayah(){
        return view('user.form.ayah');
    }
}
