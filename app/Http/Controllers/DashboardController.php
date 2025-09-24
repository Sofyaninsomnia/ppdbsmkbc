<?php

namespace App\Http\Controllers;

use App\Models\Casis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user_dashboard(){
        $user = Casis::where('user_id', Auth::id())->exists();
        return view('user.dashboard', compact('user'));
    }

    public function admin_dashboard(){
        return view('admin.index');
    }
}
