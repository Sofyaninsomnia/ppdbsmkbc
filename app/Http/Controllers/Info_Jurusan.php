<?php

namespace App\Http\Controllers;

use App\Models\InfoJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Info_Jurusan extends Controller
{
    public function index() {
        
        $info_jurusan = InfoJurusan::latest()->get();
        return view('admin.info.info jurusan.index', compact('info_jurusan'));
    }

    public function create() {
        
        $jurusan = \App\Models\Jurusan::all();
        return view('admin.info.info jurusan.create', compact('jurusan'));
    }

    public function store(Request $request) {

        $rules = [
            'jurusan_id'                => 'required|exists:jurusan,id',
            'deskripsi_singkat'         => 'required|string|max:255',
            'deskripsi'                 => 'required|string|',
            'logo'                      => 'required|image|max:3048'
        ];
    }
}
