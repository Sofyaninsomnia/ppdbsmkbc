<?php

namespace App\Http\Controllers;

use App\Models\InfoJurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Info_Jurusan extends Controller
{
    public function index()
    {

        $info_jurusan = InfoJurusan::latest()->get();
        return view('admin.info.info jurusan.index', compact('info_jurusan'));
    }

    public function create()
    {

        $jurusan = \App\Models\Jurusan::all();
        return view('admin.info.info jurusan.create', compact('jurusan'));
    }

    public function store(Request $request)
    {

        $rules = [
            'jurusan_id'                => 'required|exists:jurusan,id',
            'deskripsi_singkat'         => 'required|string|max:255',
            'deskripsi'                 => 'required|string|',
            'logo'                      => 'required|image|max:3048',
            'cover'                      => 'required|image|max:4048'
        ];

        $messages = [
            'jurusan_id.required'        => 'Pilih jurusan terlebih dahulu.',
            'jurusan_id.exists'          => 'Jurusan tidak valid.',
            'deskripsi_singkat.required' => 'Deskripsi singkat wajib diisi.',
            'deskripsi_singkat.max'      => 'Deskripsi singkat maksimal 255 karakter.',
            'deskripsi.required'         => 'Deskripsi lengkap wajib diisi.',
            'logo.required'              => 'Logo jurusan wajib diunggah.',
            'logo.image'                 => 'File logo harus berupa gambar.',
            'logo.max'                   => 'Ukuran logo maksimal 2 MB.',
            'cover.required'             => 'Foto kegiatan wajib diunggah.',
            'cover.image'                => 'File foto kegiatan harus berupa gambar.',
            'cover.max'                  => 'Ukuran foto kegiatan maksimal 4 MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $logopath   = $request->file('logo')->store('logo', 'public');
        $coverpath  = $request->file('cover')->store('cover', 'public');

        InfoJurusan::create([
            'jurusan_id'            => $request->input('jurusan_id'),
            'deskripsi_singkat'     => $request->input('deskripsi_singkat'),
            'deskripsi'             => $request->input('deskripsi'),
            'logo'                  => $logopath,
            'cover'                 => $coverpath,
        ]);

        return redirect()->route('info_jurusan.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function show(string $id)
    {
        $infoJurusan = InfoJurusan::findOrFail($id);
        return view('admin.info.info jurusan.show', compact('infoJurusan'));
    }
}
