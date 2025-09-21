<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function form_login()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            if ($user->role === 'admin') {
                Auth::guard('web')->logout(); 
                Auth::guard('admin')->loginUsingId($user->id); 
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }

            Auth::guard('web')->logout();
            return back()->withErrors(['email' => 'Hanya admin yang bisa login.']);
        }

        return back()->withErrors(['email' => 'Kredensial tidak valid.']);
    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
