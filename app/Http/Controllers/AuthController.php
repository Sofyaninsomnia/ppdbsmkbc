<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;
use App\Models\Pendaftaran;

class AuthController extends Controller
{
    function formLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

                if ($user->role === 'user') {
                    Session::put('email', $user->email);
                    Session::put('name',  $user->name);
                    Session::put('role',  $user->role);
                    Session::put('foto_profil',  $user->foto_profil);
                $request->session()->regenerate();
                return redirect()->route('user.dashboard')->with('success', 'Selamat datang ' . $user->name);
            }

            Auth::guard('web')->logout();
            return back()->with(['error' => 'Hanya user yang bisa login.']);
        }

        return back()->with(['error' => 'Kredensial tidak valid.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'kode_aktivasi' => 'required|exists:pendaftaran,kode_aktivasi',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $pendaftaran = Pendaftaran::where('kode_aktivasi', $request->kode_aktivasi)->first();
        if ($pendaftaran->user_id !== null) {
            return back()->withErrors(['kode_aktivasi' => 'Kode aktivasi ini sudah digunakan.']);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $pendaftaran->user_id = $user->id;
        $pendaftaran->save();


        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('user.dashboard');
    }       
}
