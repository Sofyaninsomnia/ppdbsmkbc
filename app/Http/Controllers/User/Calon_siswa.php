<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Casis;
use App\Models\Jurusan;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Calon_siswa extends Controller
{
    public function form_casis(){
        return view('user.calon_siswa.index');
    }

    public function form_tahap_2(){
        $jurusan = Jurusan::all();
        $tahap_1 = Pendaftaran::with('jurusan')->where('user_id', Auth::id())->first();
        $casis = Casis::where('user_id', Auth::id())->first();
        $user = Casis::where('user_id', Auth::id())->exists();
        return view('user.tahap_2', compact('jurusan', 'casis', 'user', 'tahap_1'));
    }

    public function create(Request $request){
        $rules = [
            'nisn'  => 'required|numeric|digits:10|unique:casis,nisn',
            'nik'  => 'required|numeric|digits:16|unique:casis,nik',
            'nama' => 'required|string|max:255',
            'ttl' => 'required',
            'alamat' => 'required|string',
            'agama'   => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:10048',
            'no_hp'         => 'required|numeric|min:14',
            'jurusan_id' => 'required|',
        ];

        $message = [
            'nisn.required'                 => 'Kolom nisn harus di isi!',
            'nisn.numeric'                  => 'Nisn harus berupa angka!',
            'nisn.digits'                   => 'Nisn tidak valid!',
            'nisn.unique'                   => 'Nisn sudah terdaftar!',
            'nik.required'                  => 'Kolom nik harus di isi!',
            'nik.numeric'                   => 'Nik harus berupa angka!',
            'nik.digits'                    => 'Nik tidak valid!',
            'nik.unique'                    => 'Nik sudah terdaftar!',
            'nama.required'                 => 'Kolom nama harus di isi!',
            'nama.string'                   => 'Nama tidak valid, gunakan nama asli!',
            'nama.max'                      => 'Nama terlalu panjang!',
            'ttl.required'                  => 'Kolom tanggal lahir harus di isi!',
            'alamat.required'               => 'Kolom alamat harus di isi!',
            'alamat.string'                 => 'Alamat tidak valid!',
            'agama.required'                => 'Kolom agama harus di isi!',
            'jenis_kelamin.required'        => 'Jenis kelamin tidak boleh kosong!',
            'jenis_kelamin.in'              => 'Jenis kelamin tidak valid!',
            'asal_sekolah.required'         => 'Kolom asal sekolah harus di isi!',
            'asal_sekolah.string'           => 'Asal sekolah tidak valid!',      
            'asal_sekolah.max'              => 'Asal sekolah terlalu panjang, maximal 255 huruf!',
            'foto.required'                 => 'Foto harus di isi!',
            'foto.image'                    => 'File harus berupa foto!',
            'foto.mimes'                    => 'Extensi tidak valid. Harus png, jpg, jpeg!',
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
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'ttl'           => $request->ttl,
            'alamat'        => $request->alamat,
            'agama'         => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'asal_sekolah'  => $request->asal_sekolah,
            'foto'          => $fotopath,
            'no_hp'         => $request->no_hp,
            'jurusan_id'    => $request->jurusan_id,
            'user_id'       => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}
