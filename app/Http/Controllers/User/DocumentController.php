<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessUploadedDocument;
use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Validator;
use Throwable;
use Illuminate\Bus\Batchable;

class DocumentController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $documentTypes = ['ijazah', 'akta', 'kk', 'rapot'];
        $exist = Dokumen::where('user_id', $userId)->whereIn('type', $documentTypes)->exists();
        return view('user.document', compact('exist'));
    }

    public function upload(Request $request)
    {
        // dd($request->all());
        $rules = [
            'ijazah'    => 'required|file|mimes:pdf,png,jpg|max:5048',
            'akta'      => 'required|file|mimes:pdf,png,jpg|max:5048',
            'kk'        => 'required|file|mimes:pdf,png,jpg|max:5048',
            'rapot'     => 'required|file|mimes:pdf|max:10048'
        ];

        $message = [
            'ijazah.required'           => 'Kolom ijazah harus di isi',
            'ijazah.file'               => 'Ijazah harus berbentuk file',
            'ijazah.mimes'              => 'Extensi ijazah tidak valid, harus pdf,png, atau jpg',
            'ijazah.max'                => 'Ukuran ijazah terlalu besar maximal 5mb',
            'akta.required'             => 'Kolom akta harus di isi',
            'akta.file'                 => 'akta harus berbentuk file',
            'akta.mimes'                => 'Extensi akta tidak valid, harus pdf,png, atau jpg',
            'akta.max'                  => 'Ukuran akta terlalu besar maximal 5mb',
            'kk.required'               => 'Kolom kk harus di isi',
            'kk.file'                   => 'kk harus berbentuk file',
            'kk.mimes'                  => 'Extensi kk tidak valid, harus pdf,png, atau jpg',
            'kk.max'                    => 'Ukuran kk terlalu besar maximal 5mb',
            'rapot.required'            => 'Kolom rapot harus di isi',
            'rapot.file'                => 'rapot harus berbentuk file',
            'rapot.mimes'               => 'Extensi rapot tidak valid, harus pdf',
            'rapot.max'                 => 'Ukuran rapot terlalu besar maximal 5mb',
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $documentTypes = ['ijazah', 'akta', 'kk', 'rapot'];
        $jobs = [];
        $userId = Auth::id();

        foreach ($documentTypes as $type) {
            $file = $request->file($type);

            $path = $file->store('uploads/document/' . $userId, 'public');

            $document = Dokumen::create([
                'user_id'   => $userId,
                'type'      => $type,
                'file_name' => $file->getClientOriginalName(),
                'path'      => $path,
                'status'    => 'pending'
            ]);

            $jobs[] = new ProcessUploadedDocument($document->id);
        }

        $batch = Bus::batch($jobs)->name("Proses Dokumen Use #{$userId}")->onQueue('document-upload')
            ->then(function (Bus\Batch $batch) use ($userId) {
                session()->flash('success', 'Dokumen sedang di proses!');
            })->catch(function (Bus\Batch $batch, Throwable $e) {
                session()->flash('error', "Batch {$batch->name} gagal: {$e->getMessage()}");
            })->finally(function (Bus\Batch $batch) use ($userId) {
                session()->flash('info', "Batch {$batch->name} sudah selesai (berhasil/gagal).");
            })->dispatch();

        return redirect()->back()->with('success', 'Dokumen berhasil di upload');
    }
}
