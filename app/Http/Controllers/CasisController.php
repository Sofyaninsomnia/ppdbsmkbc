<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use App\Models\Jurusan;
use App\Models\Ortu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CasisController extends Controller
{
    function index(Request $request)
    {
        $jurusan = Jurusan::all();
        $casis = Casis::with('jurusan');

        if ($request->has('jurusan_id') && $request->jurusan_id != '') {
            $casis->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';

            $casis->where(function ($query) use ($searchTerm) {
                $query->where('nisn', 'like', $searchTerm)
                    ->orWhere('nama', 'like', $searchTerm)
                    ->orWhere('asal_sekolah', 'like', $searchTerm)
                    ->orWhere('no_hp', 'like', $searchTerm)
                    ->orWhereHas('jurusan', function ($q) use ($searchTerm) {
                        $q->where('nama_jurusan', 'like', $searchTerm);
                    });
            });
        }

        $dataCasis = $casis->paginate(5);

        $selectedJurusanId = $request->jurusan_id;
        $searchTerm = $request->search;
        return view('admin.casis', compact('jurusan', 'dataCasis', 'selectedJurusanId', 'searchTerm'));
    }

    function create()
    {
        $jurusan = Jurusan::all();
        $allOrtu = Ortu::all();

        $ayah = $allOrtu->where('jenis_kelamin', 'laki-laki');
        $ibu = $allOrtu->where('jenis_kelamin', 'perempuan');

        return view('admin.tambah_casis', compact('jurusan', 'ayah', 'ibu'));
    }

    function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nisn'  => 'required|numeric|digits:10|unique:casis,nisn',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'agama'   => 'required|string',
            'ayah_id'   => 'required|',
            'ibu_id'   =>  'required|',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'no_hp'         => 'required|string|min:10|max:15',
            'jurusan_id' => 'required|',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fotopath   = $request->file('foto')->store('pas_foto', 'public');

        $casis = new Casis;
        $casis->nisn = $request->nisn;
        $casis->nama = $request->nama;
        $casis->tgl_lahir = $request->tgl_lahir;
        $casis->alamat = $request->alamat;
        $casis->agama = $request->agama;
        $casis->ayah_id = $request->ayah_id;
        $casis->ibu_id = $request->ibu_id;
        $casis->jenis_kelamin = $request->jenis_kelamin;
        $casis->asal_sekolah = $request->asal_sekolah;
        $casis->foto = $fotopath;
        $casis->no_hp = $request->no_hp;
        $casis->jurusan_id = $request->jurusan_id;

        $casis->save();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil ditambahkan.');
    }

    function show(string $id)
    {
        $casis = Casis::with(['ayah', 'ibu', 'jurusan'])->findOrFail($id);
        $listJurusan = Jurusan::all();
        return view('admin.detail_casis', compact('casis', 'listJurusan'));
    }

    function edit(string $id)
    {

        $casis = Casis::findOrFail($id);
        $listJurusan = Jurusan::all();
        return view('admin.edit', compact('casis', 'listJurusan'));
    }

    public function update(Request $request, $id)
    {
        // 1. Temukan data Casis yang akan diperbarui
        $casis = Casis::findOrFail($id);

        // 2. Definisi Aturan Validasi
        $validator = Validator::make($request->all(), [
            'nisn' => [
                'required',
                'numeric',
                'digits:10',
            ],
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'no_hp' => 'required|string|min:10|max:15',
            'jurusan_id' => 'required|exists:jurusan,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('foto')) {
            if ($casis->foto && Storage::disk('public')->exists($casis->foto)) {
                Storage::disk('public')->delete($casis->foto);
            }
            $fotopath = $request->file('foto')->store('pas_foto', 'public');
            $casis->foto = $fotopath;
        }

        $casis->nisn = $request->nisn;
        $casis->nama = $request->nama;
        $casis->tgl_lahir = $request->tgl_lahir;
        $casis->alamat = $request->alamat;
        $casis->jenis_kelamin = $request->jenis_kelamin;
        $casis->asal_sekolah = $request->asal_sekolah;
        $casis->no_hp = $request->no_hp;
        $casis->jurusan_id = $request->jurusan_id;

        // 6. Simpan Perubahan
        $casis->save();

        // 7. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil diperbarui.');
    }

    function destroy(string $id)
    {
        $casis = Casis::findOrFail($id);
        $casis->delete();

        return redirect()->route('casis.index')->with('success', 'Data calon siswa berhasil dihapus.');
    }
}
