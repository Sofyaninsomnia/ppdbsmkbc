<?php

namespace App\Http\Controllers;

use App\Models\InfoJurusan;
use Illuminate\Http\Request;

class Home extends Controller
{
    function index() {

        $infoJurusan = InfoJurusan::latest()->get();
        return view('home.welcome', compact('infoJurusan'));
    }
}
