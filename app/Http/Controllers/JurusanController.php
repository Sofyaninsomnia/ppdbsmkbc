<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    function index() {

        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
    }

    function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'nama_jurusan'  => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $jurusan = new Jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect()->route('jurusan.index')->with(['success' => 'Data berhasil ditambahkan']);

    }

    function destroy($id){
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
