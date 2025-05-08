<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CasisController extends Controller
{
    function index()
    {
        $dataCasis = Casis::all();
        return view('admin.casis', compact('dataCasis'));
    }

    function create()
    {
        return view('admin.tambah_casis');
    }

    function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan' => 'required|in:Teknik Komputer dan Jaringan,Rekayasa Perangkat Lunak,Multimedia',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $casis = new Casis;
        $casis->nama = $request->nama;
        $casis->tgl_lahir = $request->tgl_lahir;
        $casis->alamat = $request->alamat;
        $casis->jenis_kelamin = $request->jenis_kelamin;
        $casis->asal_sekolah = $request->asal_sekolah;
        $casis->jurusan = $request->jurusan;

        $casis->save();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil ditambahkan.');
    }

    function edit(string $id){

        $casis = Casis::findOrFail($id);
        return view('admin.edit', compact('casis'));
    }

    function update(Request $request, $id){
        
        $casis = Casis::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan' => 'required|in:Teknik Komputer dan Jaringan,Rekayasa Perangkat Lunak,Multimedia',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $casis->nama = $request->nama;
        $casis->tgl_lahir = $request->tgl_lahir;
        $casis->alamat = $request->alamat;
        $casis->jenis_kelamin = $request->jenis_kelamin;
        $casis->asal_sekolah = $request->asal_sekolah;
        $casis->jurusan = $request->jurusan;
        $casis->save();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil diperbarui.');
        
    }

    function destroy(string $id){
        $casis = Casis::findOrFail($id);
        $casis->delete();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil dihapus.');
    }
}