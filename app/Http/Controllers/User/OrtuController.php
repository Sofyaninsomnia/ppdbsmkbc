<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Ortu;

class OrtuController extends Controller
{
    public function index(){
        $userId = Auth::user()->id;
        $cekAyah = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'laki-laki')->exists();
        $cekIbu = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'perempuan')->exists();
        return view('user.ortu', compact('cekAyah', 'cekIbu'));
    }

    public function ayah(){
        return view('user.form.ayah');
    }

    public function ibu(){
        return view('user.form.ibu');
    }

    public function create_data(Request $request){
        $rules = [
            'nik'       => 'required|numeric|digits:16|unique:ortu,nik',
            'nama'      => 'required|string|min:3|max:100',
            'ttl'       => 'required|string|min:15|max:100',
            'pekerjaan' => 'required|string|min:4|max:100',
            'alamat'    => 'required|string'
        ];

        $message = [
            'nik.required'                  => 'Nik harus di isi',
            'nik.numeric'                   => 'Nik harus berupa angka',
            'nik.digits'                    => 'Nik harus 16 angka',
            'nik.unique'                    => 'Nik sudah terdaftar',
            'nama.required'                 => 'Nama harus di isi',
            'nama.string'                   => 'Nama tidak valid',
            'nama.min'                      => 'Nama terlalu pendek, minimal 3 huruf',
            'nama.max'                      => 'Nama terlalu panjang, maximal 100 huruf',
            'ttl.required'                  => 'TTL harus di isi',
            'ttl.string'                    => 'TTL tidak valid',
            'ttl.min'                       => 'TTL terlalu pendek minimal 15 karakter',
            'ttl.max'                       => 'TTL terlalu panjang maximal 100 karakter',
            'alamat.required'               => 'Alamat harus di isi',
            'alamat.string'                 => 'Alamat tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Ortu::create([
            'nik'           => $request->nik,
            'nama'          => $request->nama,
            'ttl'           => $request->ttl,
            'no_hp'         => $request->no_hp,
            'pekerjaan'     => $request->pekerjaan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'user_id'       => Auth::user()->id
        ]);

        return redirect()->route('data.ortu')->with('success', 'Data berhasil dikirim   ');
    }
}
