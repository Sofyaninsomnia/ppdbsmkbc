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

        return view('admin.tambah_casis', compact('jurusan'));
    }

    function store(Request $request)
    {

        $rules = [
            'nisn'  => 'required|numeric|digits:10|unique:casis,nisn',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'agama'   => 'required|string',
            'ayah'   => 'required|string|min:3|max:100',
            'ibu'   =>  'required|string|min:3|max:100',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:15048',
            'no_hp'         => 'required|numeric|min:14',
            'jurusan_id' => 'required|',

        ];

        $message = [
            'nisn.required'                 => 'Kolom nisn harus di isi!',
            'nisn.numeric'                  => 'Nisn harus berupa angka!',
            'nisn.digits'                   => 'Nisn tidak valid!',
            'nisn.unique'                   => 'Nisn sudah terdaftar!',
            'nama.required'                 => 'Kolom nisn harus di isi!',
            'nama.string'                   => 'Nama tidak valid, gunakan nama asli!',
            'nama.max'                      => 'Nama terlalu panjang!',
            'tgl_lahir.required'            => 'Kolom tanggal lahir harus di isi!',
            'tgl_lahir.date'                => 'Tanggal lahir tidak valid, harus berupa tanggal!',
            'alamat.required'               => 'Kolom alamat harus di isi!',
            'alamat.string'                 => 'Alamat tidak valid!',
            'agama.required'                => 'Kolom agama harus di isi!',
            'ayah.required'                 => 'Kolom nama ayah harus di isi!',
            'ayah.string'                   => 'Nama ayah tidak valid!',
            'ayah.min'                      => 'Nama ayah terlalu pendek, minimal 3 huruf!',
            'ayah.max'                      => 'Nama ayah terlalu panjang, maximal 100 huruf!',
            'ibu.required'                  => 'Kolo nama ibu harus di isi!',
            'ibu.string'                    => 'Nama ibu tidak valid!',
            'ibu.min'                       => 'Nama ibu terlalu pendek, minimal 2 huruf',
            'ibu.max'                       => 'Nama ibu terlalu panjang, maximal 100 huruf',
            'jenis_kelamin.required'        => 'Jenis kelamin tidak boleh kosong!',
            'jenis_kelamin.in'              => 'Jenis kelamin tidak valid!',
            'asal_sekolah.required'         => 'Kolom asal sekolah harus di isi!',
            'asal_sekolah.string'           => 'Asal sekolah tidak valid!',      
            'asal_sekolah.max'              => 'Asal sekolah terlalu panjang, maximal 255 huruf!',
            'foto.required'                 => 'Foto harus di isi!',
            'foto.image'                    => 'File harus berupa foto!',
            'foto.mimes'                    => 'Extensi file harus berupa foto!',
            'foto.max'                      => 'Ukuran foto terlalu besar, maximal 15mb',
            'no_hp.required'                => 'Kolom nomor hp harus di isi!',
            'no_hp.numeric'                 => 'Nomor hp harus berupa angka!',
            'no_hp.min'                     => 'Nomor hp terlalu pendek, minimal 14 angka!',
            'jurusan_id'                    => 'Silahkan pilih jurusan terlebih dahulu!'

        ];
        
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fotopath   = $request->file('foto')->store('pas_foto', 'public');


        Casis::create([
            'nisn'          => $request->nisn,
            'nama'          => $request->nama,
            'tgl_lahir'     => $request->tgl_lahir,
            'ayah'          => $request->ayah,
            'ibu'           => $request->ibu,
            'alamat'        => $request->alamat,
            'agama'         => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'asal_sekolah'  => $request->asal_sekolah,
            'foto'          => $fotopath,
            'no_hp'         => $request->no_hp,
            'jurusan_id'    => $request->jurusan_id
        ]);

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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
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
