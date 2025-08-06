<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user_dashboard(){
        return view('user.dashboard');
    }

    public function admin_dashboard(){
        return view('admin.index');
    }
}
