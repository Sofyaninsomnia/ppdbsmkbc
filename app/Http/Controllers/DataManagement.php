<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataManagement extends Controller
{
    public function casis(){
        return view('admin.data.casis');
    }
}
