<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class CasisController extends Controller
{
    function index()
    {
        $jurusan = Jurusan::all();
        $dataCasis = Casis::with('jurusan')->latest()->get();
        return view('admin.casis', compact( 'jurusan', 'dataCasis'));
    }

    function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.tambah_casis', compact('jurusan'));
    }

    function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_id' => 'required|',

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
        $casis->jurusan_id = $request->jurusan_id;

        $casis->save();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil ditambahkan.');
    }

    function edit(string $id)
    {

        $casis = Casis::findOrFail($id);
        $listJurusan = Jurusan::all();
        return view('admin.edit', compact('casis', 'listJurusan'));
    }

    function update(Request $request, $id)
    {

        $casis = Casis::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'jurusan_id' => 'required|',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $casis->nama = $request->nama;
        $casis->tgl_lahir = $request->tgl_lahir;
        $casis->alamat = $request->alamat;
        $casis->jenis_kelamin = $request->jenis_kelamin;
        $casis->asal_sekolah = $request->asal_sekolah;
        $casis->jurusan_id = $request->jurusan_id;
        $casis->save();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil diperbarui.');
    }

    function destroy(string $id)
    {
        $casis = Casis::findOrFail($id);
        $casis->delete();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil dihapus.');
    }
}
