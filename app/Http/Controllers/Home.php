<?php

namespace App\Http\Controllers;

use App\Models\InfoJurusan;
use Illuminate\Http\Request;
use App\Models\Jurusan;

class Home extends Controller
{
    function index() {

        $infoJurusan = InfoJurusan::latest()->get();
        return view('home.welcome', compact('infoJurusan'));
    }

    function show(string $id){

        $jurusan = Jurusan::all();
        $infoJurusan = InfoJurusan::with('jurusan')->findOrFail($id);
        return view('home.show', compact('infoJurusan', 'jurusan'));
    }
}
