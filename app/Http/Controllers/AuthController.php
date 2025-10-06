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

    public function formLogin_admin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

                if ($user->role === 'user') {
                $request->session()->regenerate();
                return redirect()->route('user.dashboard')->with('success', 'Selamat datang ' . $user->name);
            }

            Auth::guard('web')->logout();
            return back()->with(['error' => 'Hanya user yang bisa login.']);
        }

        return back()->with(['error' => 'Kredensial tidak valid.']);
    }

    public function login_admin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();

            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang ' . $user->name);
            }

            Auth::guard('web')->logout();
            return back()->withErrors(['email' => 'Hanya admin yang bisa login.']);
        }

        return back()->withErrors(['email' => 'Kredensial tidak valid.']);
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
