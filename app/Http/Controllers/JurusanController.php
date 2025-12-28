<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    function index()
    {

        $jurusan = Jurusan::all();
        
        return view('admin.jurusan.index', compact('jurusan'));
    }

    function store(Request $request)
    {

        $rules = [
            'nama_jurusan'  => 'required|string|max:100',
            'kuota'         => 'required|numeric|min:1|max_digits:11',
            'skt'           => 'required|string|min:2|max:10'
        ];

        $message = [
            'nama_jurusan.required'         => 'Kolom nama jurusan harap di isi!',
            'nama_jurusan.string'           => 'Nama jurusan tidak valid!',
            'nama_jurusan.max'              => 'Nama jurusan terlalu panjang, maximal 100 huruf',
            'kuota.required'                => 'Kuota harus di isi!',
            'kuota.numeric'                 => 'Data kuota harus berupa angka',
            'kuota.min'                     => 'Kuota terlalu kecil min 1 angka',
            'kuota.max_digits'              => 'Kuota terlalu banyak maximal 99.999.999.999',
            'skt.required'                  => 'Singkatan harus di isi!',
            'skt.string'                    => 'Singkatan tidak valid',
            'skt.min'                       => 'Singkatan terlalu pendek, minimal 3 huruf',
            'skt.max'                       => 'Singkatan terlalu panjang, maximal 10 huruf'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Jurusan::create([
            'nama_jurusan'  => $request->nama_jurusan,
            'kuota'         => $request->kuota,
            'skt'           => $request->skt
        ]);

        return redirect()->route('jurusan.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function show_infoJurusan($id)
    {
        $info = Jurusan::with('info')->findOrFail($id);
        return view('admin.jurusan.info_jurusan', compact('info'));
    }

    function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    function update(Request $request, $id)
    {
        // dd($request->all());
        $jurusan = Jurusan::findOrFail($id);

        $rules = [
            'nama_jurusan'  => 'required|string|max:100',
            'kuota'         => 'required|numeric|min:1|max_digits:11',
            'skt'           => 'required|string|min:2|max:10'
        ];

        $message = [
            'nama_jurusan.required'         => 'Kolom nama jurusan harap di isi!',
            'nama_jurusan.string'           => 'Nama jurusan tidak valid!',
            'nama_jurusan.max'              => 'Nama jurusan terlalu panjang, maximal 100 huruf',
            'kuota.required'                => 'Kuota harus di isi!',
            'kuota.numeric'                 => 'Data kuota harus berupa angka',
            'kuota.min'                     => 'Kuota terlalu kecil min 1 angka',
            'kuota.max_digits'              => 'Kuota terlalu banyak maximal 99.999.999.999',
            'skt.required'                  => 'Singkatan harus di isi!',
            'skt.string'                    => 'Singkatan tidak valid',
            'skt.min'                       => 'Singkatan terlalu pendek, minimal 3 huruf',
            'skt.max'                       => 'Singkatan terlalu panjang, maximal 10 huruf'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'nama_jurusan'  => $request->nama_jurusan,
            'kuota'         => $request->kuota,
            'skt'           => $request->skt
        ];

        $jurusan->update($data);

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil ditambahkan');
    }

    function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
