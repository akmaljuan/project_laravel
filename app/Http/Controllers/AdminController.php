<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarPoli;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Support\Carbon;



class AdminController extends Controller
{
      public function index()
    {
        return view('admin.dashboard'); // pastikan file ini ada: resources/views/admin/dashboard.blade.php
    }
    public function pasien()
{
    $pasiens = Pasien::with('user')->get();
    $users = User::where('role', 'pasien')->get();
    return view('admin.pasien.index', compact('pasiens', 'users'));
}



public function storePasien(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',

        'nama_pasien' => 'required|string',
        'no_ktp' => 'required|string',
        'alamat' => 'required|string',
        'no_hp' => 'required|string',
    ]);

    // 1. Simpan user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'pasien',
    ]);

    // 2. Buat nomor RM otomatis
    $prefix = Carbon::now()->format('Ym'); // Contoh: 202506
    $lastPasien = \App\Models\Pasien::where('no_rm', 'like', $prefix . '%')
                    ->orderBy('no_rm', 'desc')
                    ->first();

    if ($lastPasien) {
        // Ambil nomor urut terakhir, lalu tambah 1
        $lastNumber = (int)substr($lastPasien->no_rm, -3);
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newNumber = '001';
    }

    $no_rm = $prefix . $newNumber;

    // 3. Simpan pasien
    Pasien::create([
        'user_id' => $user->id,
        'nama' => $request->nama_pasien,
        'alamat' => $request->alamat,
        'no_ktp' => $request->no_ktp,
        'no_hp' => $request->no_hp,
        'no_rm' => $no_rm,
    ]);

    return redirect()->route('admin.pasien')->with('success', 'Pasien berhasil ditambahkan dengan No RM: ' . $no_rm);
}


}
