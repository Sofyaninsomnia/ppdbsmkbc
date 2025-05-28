<?php

namespace App\Http\Controllers;

use App\Models\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrtuController extends Controller
{
    function index() {
        $ortu = Ortu::all();
        return view('admin.ortu.index', compact('ortu'));
    }

    function create(){
        return view('admin.ortu.create');
    }

    function store(Request $request) {
        $rules = [
            'nik'           => 'required|numeric|digits:16|unique:ortu,nik',
            'nama'          => 'required|string|max:100|min:3',
            'no_hp'         => 'required|numeric|min:11',
            'pekerjaan'     => 'required|',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat'        => 'required'
            
        ];

        $messages = [
            'nik.required'          =>'nik harus di isi',
            'nik.numeric'           =>'nik harus berupa angka',
            'nik.unique'            =>'nik sudah terdaftar',
            'nama.required'         =>'nama harus di isi',
            'nama.max'              =>'panjang nama maximal 100 huruf',
            'nama.min'              =>'nama minimal 3 huruf',
            'no_hp.required'        =>'no hp harus di isi',
            'no_hp.numeric'         =>'no hp harus berupa angka',
            'no_hp.min'             =>'minimal 11 angka',
            'pekerjaan.required'    =>'pekerjaan harus di isi',
            'jenis_kelamin.required'=>'jenis kelamin harus di isi',
            'jenis_kelamin.in'      =>'jenis_kelamin tidak valid',
            'alamat.required'       =>'alamat wajib di isi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Ortu::create([
            'nik'           => $request->input('nik'),
            'nama'          => $request->input('nama'),
            'no_hp'         => $request->input('no_hp'),
            'pekerjaan'     => $request->input('pekerjaan'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat'        => $request->input('alamat')
        ]);

        return redirect()->route('ortu.index')->with(['success'    => 'Data berhasil ditambahkan']);
    }
}
