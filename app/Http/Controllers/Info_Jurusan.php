<?php

namespace App\Http\Controllers;

use App\Models\InfoJurusan;
use App\Models\Jurusan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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

    public function store(Request $request, ImageManager $manager)
    {

        $rules = [
            'jurusan_id'                => 'required|exists:jurusan,id',
            'deskripsi_singkat'         => 'required|string|max:255',
            'deskripsi'                 => 'required|string|',
            'logo'                      => 'required|image|max:2048|mimes:jpg,png,jpeg,webp',
            'cover'                      => 'required|image|max:3048|mimes:jpg,png,jpeg,webp'
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
            'logo.mimes'                 => 'Extensi logo tidak valid! harus jpg,png,jpeg,webp',
            'cover.required'             => 'Foto kegiatan wajib diunggah.',
            'cover.image'                => 'File foto kegiatan harus berupa gambar.',
            'cover.max'                  => 'Ukuran foto kegiatan maksimal 4 MB.',
            'cover.mimes'                => 'Extensi cover tidak valid! harus jpg,png,jpeg,webp'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $filename  = Str::random(40) . '.webp';
        $fileLogo  = $request->file('logo');
        
        $imageLogo = $manager->read($fileLogo)->encodeByMediaType('image/webp', quality: 80);

        $pathLogo  = 'logo/' . $filename;
        Storage::disk('public')->put($pathLogo, (string) $imageLogo);

        $fileCover  = $request->file('cover');
        $imageCover = $manager->read($fileCover)->encodeByMediaType('image/webp', quality: 80);

        $pathCover  = 'cover/' . $filename;
        Storage::disk('public')->put($pathCover, (string) ($imageCover));
        
        

        InfoJurusan::create([
            'jurusan_id'            => $request->input('jurusan_id'),
            'deskripsi_singkat'     => $request->input('deskripsi_singkat'),
            'deskripsi'             => $request->input('deskripsi'),
            'logo'                  => $pathLogo,
            'cover'                 => $pathCover,
        ]);

        return redirect()->route('info_jurusan.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function show(string $id)
    {
        $infoJurusan = InfoJurusan::findOrFail($id);
        return view('admin.info.info jurusan.show', compact('infoJurusan'));
    }

    public function edit(string $id)
    {
        $infoJurusan = InfoJurusan::findOrFail($id);
        $listJurusan = Jurusan::all();

        return view('admin.info.info jurusan.edit', compact('infoJurusan', 'listJurusan'));
    }

    public function update(Request $request, $id)
    {

        $infoJurusan = InfoJurusan::findOrFail($id);
        $rules = [
            'jurusan_id'                => 'required|exists:jurusan,id',
            'deskripsi_singkat'         => 'required|string|max:255',
            'deskripsi'                 => 'required|string|',
            'logo'                      => 'nullable|image|max:3048',
            'cover'                     => 'nullable|image|max:4048'
        ];

        $messages = [
            'jurusan_id.required'        => 'Pilih jurusan terlebih dahulu.',
            'jurusan_id.exists'          => 'Jurusan tidak valid.',
            'deskripsi_singkat.required' => 'Deskripsi singkat wajib diisi.',
            'deskripsi_singkat.max'      => 'Deskripsi singkat maksimal 255 karakter.',
            'deskripsi.required'         => 'Deskripsi lengkap wajib diisi.',
            'logo.image'                 => 'File logo harus berupa gambar.',
            'logo.max'                   => 'Ukuran logo maksimal 2 MB.',
            'cover.image'                => 'File foto kegiatan harus berupa gambar.',
            'cover.max'                  => 'Ukuran foto kegiatan maksimal 4 MB.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $update = [
            'jurusan_id'            => $request->input('jurusan_id'),
            'deskripsi_singkat'     => $request->input('deskripsi_singkat'),
            'deskripsi'             => $request->input('deskripsi'),
        ];

        if ($request->hasFile('logo')){
            if ($infoJurusan->logo){
                Storage::disk('public')->delete($infoJurusan->logo);
            }
            $logopath = $request->file('logo')->store('logo', 'public');
            $update['logo'] = $logopath;
        }

        if ($request->hasFile('cover')){
            if ($infoJurusan->cover){
                Storage::disk('public')->delete($infoJurusan->cover);
            }
            $coverpath = $request->file('cover')->store('cover', 'public');
            $update['cover'] = $coverpath;
        }

        $infoJurusan->update($update);

        return redirect()->route('info_jurusan.index')->with(['success' => 'Data berhasil di update']);
    }

    public function destroy(string $id){

        $info_jurusan = InfoJurusan::findOrFail($id);
        $info_jurusan->delete();
        Storage::disk('public')->delete($info_jurusan->logo);
        Storage::disk('public')->delete($info_jurusan->cover);

        return redirect()->route('info_jurusan.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
