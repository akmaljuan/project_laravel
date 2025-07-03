<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
        'alamat' => 'required|string',
        'no_hp' => 'required|string',
    ]);

    // Simpan user baru
    $user = \App\Models\User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'pasien', // pastikan kolom `role` ada dan default pasien
    ]);

    // Simpan pasien
    \App\Models\Pasien::create([
        'user_id' => $user->id,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->back()->with('success', 'Pasien berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
