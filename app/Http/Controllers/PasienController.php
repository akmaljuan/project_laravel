<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa; 
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;// ← tambahkan ini

class PasienController extends Controller
{
    public function index()
    {
        return view('pasien.index'); // pastikan kamu punya file resources/views/pasien/index.blade.php
    }

    public function dashboard()
    {
        return view('pasien.dashboard');
    }
public function poli()
{
    $user = auth()->user();
    $pasien = $user->pasien;

    if (!$pasien) {
        return redirect()->back()->with('error', 'Akun Anda belum terhubung dengan data pasien.');
    }

    $polis = Poli::all();
    $jadwals = JadwalPeriksa::with(['dokter.poli'])->get();


    $daftarPoli = DaftarPoli::with(['jadwal.dokter', 'jadwal.poli'])
        ->where('pasien_id', $pasien->id)
        ->orderByDesc('created_at')
        ->get();

    return view('pasien.poli', compact('polis', 'jadwals', 'daftarPoli'));
}


public function storePoli(Request $request)
{
    $request->validate([
        'jadwal_id' => 'required|exists:jadwal_periksas,id',
        'keluhan' => 'required|string',
    ]);

    $pasienId = auth()->user()->pasien->id;
    $today = \Carbon\Carbon::today();

    // Ambil jadwal periksa
    $jadwal = \App\Models\JadwalPeriksa::findOrFail($request->jadwal_id);

    // Hitung jumlah antrian hari ini berdasarkan poli dan tanggal
    $jumlahAntrianHariIni = DaftarPoli::where('poli_id', $jadwal->poli_id)
        ->whereDate('created_at', $today)
        ->count();

    // Antrian dimulai dari 1
    $noAntrian = $jumlahAntrianHariIni + 1;

    // Simpan ke daftar_polis
    DaftarPoli::create([
        'pasien_id' => $pasienId,
        'poli_id' => $jadwal->poli_id,
        'jadwal_id' => $jadwal->id,
        'keluhan' => $request->keluhan,
        'no_antrian' => $noAntrian,
        'status' => 'Belum diperiksa',
    ]);

    return redirect()->back()->with('success', 'Berhasil mendaftar poli. Nomor antrian Anda: ' . $noAntrian);
}





public function detailPeriksa($id)
{
    $daftar = DaftarPoli::with(['jadwal.dokter', 'jadwal.poli', 'pasien', 'periksa.detailPeriksa.obat'])->findOrFail($id);

    return view('pasien.detail_periksa', compact('daftar'));
}



}