<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Pasien;
use Carbon\Carbon; 

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            return match ($role) {
                'admin' => redirect()->route('admin.index'),
                'dokter' => redirect()->route('dokter.dashboard'),
                'pasien' => redirect()->route('pasien.dashboard'),
                default => redirect()->route('landing'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'alamat' => 'required|string',
        'no_ktp' => 'required|string|max:25|unique:pasiens,no_ktp',
        'no_hp' => 'required|string|max:50',
    ]);

    // Simpan ke tabel users
    $user = User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'pasien',
    ]);

    /// Generate nomor RM otomatis: format YYYYMMNNN
        $count = Pasien::count() + 1;
        $now = Carbon::now();
        $year = $now->format('Y');
        $month = $now->format('m');
        $newNoRM = $year . $month . str_pad($count, 3, '0', STR_PAD_LEFT);;

    // Simpan ke tabel pasiens
    Pasien::create([
        'user_id' => $user->id,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_ktp' => $request->no_ktp,
        'no_hp' => $request->no_hp,
        'no_rm' => $newNoRM,
    ]);

    Auth::login($user);
    return redirect()->route('pasien.dashboard');
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }
}
