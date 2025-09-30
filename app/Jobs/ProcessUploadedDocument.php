<?php
// app/Jobs/ProcessDocument.php

namespace App\Jobs;

use App\Models\Dokumen;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\Batchable;

class ProcessUploadedDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Batchable;

    public $documentId;
    public $tries = 3; // Coba ulang hingga 3 kali jika gagal

    public function __construct(int $documentId)
    {
        $this->documentId = $documentId;
    }

    public function handle(): void
    {
        $document = Dokumen::find($this->documentId);

        if (!$document) {
            return; // Document tidak ditemukan, akhiri job
        }

        try {
            // 1. Ambil path file
            $sourcePath = $document->path;
            $fileContent = Storage::disk('public')->get($sourcePath);

            // 2. Lakukan Logika Pemrosesan (Contoh)
            if ($document->type === 'rapot') {
                // Logika khusus untuk Rapot (misalnya: hanya boleh PDF, ekstraksi nilai)
                // $this->extractDataFromRaport($fileContent);
            }
            // Anda bisa tambahkan logika verifikasi OCR untuk KK/Ijazah di sini.

            // 3. Pindahkan File ke Lokasi Permanen
            $destinationFolder = "uploads/final/{$document->user_id}";
            $newPath = $destinationFolder . '/' . basename($sourcePath);
            
            Storage::disk('public')->move($sourcePath, $newPath);

            // 4. Perbarui Status di Database
            $document->update([
                'path' => $newPath,
                'status' => 'processed',
                'processed_at' => now(),
            ]);

        } catch (\Exception $e) {
            // Jika ada error selama pemrosesan:
            $document->update(['status' => 'failed']);
            
            // Melemparkan Exception akan membuat Job dicoba ulang (hingga $this->tries)
            throw $e; 
        }
    }
}