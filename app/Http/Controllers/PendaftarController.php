<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PendaftarController extends Controller
{
    private const MAX_PENDAFTAR = 100;

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    function index(Request $request)
    {
        $jurusan = Jurusan::all();

        $queryPendaftaran = Pendaftaran::with('jurusan');

        if ($request->has('jurusan_id') && $request->jurusan_id != '') {
            $queryPendaftaran->where('jurusan_id', $request->jurusan_id);
        }

        if ($request->has('search') && $request->search != '') {
            $searchTerm = '%' . $request->search . '%';

            $queryPendaftaran->where(function($query) use ($searchTerm) {
                $query->where('nisn', 'like', $searchTerm)
                      ->orWhere('nama_lengkap', 'like', $searchTerm)
                      ->orWhere('asal_sekolah', 'like', $searchTerm)
                      ->orWhere('no_hp', 'like', $searchTerm)
                      ->orWhereHas('jurusan', function($q) use ($searchTerm) {
                          $q->where('nama_jurusan', 'like', $searchTerm);
                      });
            });
        }

        $pendaftaran = $queryPendaftaran->paginate(5);

        $selectedJurusanId = $request->jurusan_id;
        $searchTerm = $request->search;

        return view('admin.info.info ppdb.index', compact('jurusan', 'pendaftaran', 'selectedJurusanId', 'searchTerm'));
    }


    function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')->with(['success' => 'Data berhasil di hapus!']);
    }

    function registrasi()
    {
        $jurusan = Jurusan::all();
        return view('pendaftaran', compact('jurusan'));
    }

    function add_registrasi(Request $request)
    {
        $rules = [
            'nisn'          => 'required|numeric|digits:10|unique:pendaftaran,nisn',
            'nama_lengkap'  => 'required|string|min:4|max:100',
            'asal_sekolah'  => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'jurusan_id'    => 'required|integer|exists:jurusan,id',
            'no_hp'         => 'required|string|min:10|max:15',
        ];

        $messages = [
            'nisn.unique'           => 'NISN sudah terdaftar.',
            'nisn.required'         => 'NISN wajib diisi.',
            'nisn.numeric'          => 'NISN harus berupa angka.',
            'nisn.digits'           => 'NISN harus terdiri dari 10 digit.',
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi.',
            'nama_lengkap.string'   => 'Nama Lengkap harus berupa teks.',
            'nama_lengkap.min'      => 'Nama Lengkap minimal 4 karakter.',
            'nama_lengkap.max'      => 'Nama Lengkap maksimal 100 karakter.',
            'asal_sekolah.required' => 'Asal Sekolah wajib diisi.',
            'asal_sekolah.string'   => 'Asal Sekolah harus berupa teks.',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'jenis_kelamin.in'      => 'Jenis Kelamin tidak valid.',
            'jurusan_id.required'   => 'Jurusan wajib diisi.',
            'jurusan_id.integer'    => 'Jurusan harus berupa angka.',
            'jurusan_id.exists'     => 'Jurusan tidak valid.',
            'no_hp.required'        => 'No HP wajib diisi',
            'no_hp.string'          => 'No HP harus berupa teks',
            'no_hp.min'             => 'No HP minimal 10 karakter',
            'no_hp.max'             => 'No HP maksimal 15 karakter',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request, &$pendaftaran_baru) {
            $pendaftaran_baru = Pendaftaran::create([
                'nisn' => $request->nisn,
                'nama_lengkap' => $request->nama_lengkap,
                'asal_sekolah' => $request->asal_sekolah,
                'jenis_kelamin' => $request->jenis_kelamin,
                'jurusan_id' => $request->jurusan_id,
                'no_hp' => $request->no_hp,
            ]);

            $jumlahPendaftar = Pendaftaran::count();

            if ($jumlahPendaftar > self::MAX_PENDAFTAR) {
                $pendaftarTerlama = Pendaftaran::orderBy('created_at', 'asc')->first();

                if ($pendaftarTerlama) {
                    $pendaftarTerlama->delete();
                }
            }
        });

        return redirect()->route('daftar.show_print_form', ['id' => $pendaftaran_baru->id])
                         ->with('success', 'Pendaftaran berhasil! Silakan cetak data Anda.')
                         ->with('redirect_to_print', route('daftar.show_print_form', ['id' => $pendaftaran_baru->id]));
    }

    function show_print_form(string $id)
    {
        $pendaftaran = Pendaftaran::with('jurusan')->findOrFail($id);
        return view('print_form', compact('pendaftaran'));
    }
}