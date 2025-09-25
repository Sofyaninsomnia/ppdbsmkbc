<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ortu;

class DashboardController extends Controller
{
    public function user_dashboard(){
        $userId = Auth::user()->id;
        $user = Casis::where('user_id', $userId)->exists();
        $cekAyah = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'laki-laki')->exists();
        $cekIbu = Ortu::where('user_id', $userId)->where('jenis_kelamin', 'perempuan')->exists();
        return view('user.dashboard', compact('user', 'cekAyah', 'cekIbu'));
    }

    public function admin_dashboard(){
        return view('admin.index');
    }
}
