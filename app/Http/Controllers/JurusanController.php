<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    function index() {
        return view('admin.jurusan.index');
    }
}
