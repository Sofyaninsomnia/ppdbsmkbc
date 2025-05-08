<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class SiswaController extends Controller
{
    function index()
    {
        $siswa = Siswa::get();
        return view('siswa.index', compact('siswa'));
    }

    function create()
    {
        return view('siswa.tambah');
    }

    function store(Request $request) {

        $request->validate([
            'nisn'              => 'required|max:8',
            'nama'              => 'required|min:4',
            'alamat'            => 'required|min:8',
            'no_hp'             => 'required|min:8|max:12',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan,Dirahasiakan',
            'hobi'              => 'nullable|string'
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    function update(Request $request, string $id)
    {
        $request->validate([
            'nisn'              => 'required|max:8',
            'nama'              => 'required|min:4',
            'alamat'            => 'required|min:8',
            'no_hp'             => 'required|min:8|max:12',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'hobi'              => 'nullable|string'
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa = Siswa::update($request->all());

        return redirect()->route('siswa.index', compact('siswa'))->with(['success' => 'Data berhasil diubah']);
    }

    function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
