<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ortu;
use App\Models\Dokumen;
use App\Models\Jurusan;

class DashboardController extends Controller
{
    public function user_dashboard(){
        $userId = Auth::user()->id;
        $documentTypes = ['ijazah', 'akta', 'kk', 'rapot'];
        $exist = Dokumen::where('user_id', $userId)->whereIn('type', $documentTypes)->exists();
        $user = Casis::where('user_id', $userId)->exists();
        $cekAyah = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'laki-laki')->exists();
        $cekIbu = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'perempuan')->exists();
        // dd($cekIbu);
        return view('user.dashboard', compact('user', 'cekAyah', 'cekIbu', 'exist'));
    }

    public function admin_dashboard(){
        $jurusan = Jurusan::with('info')->get();
        // dd($jurusan);
        return view('admin.index', compact('jurusan'));
    }
}
