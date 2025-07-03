<?php

// app/Http/Controllers/DaftarPoliController.php

namespace App\Http\Controllers;

use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    public function create()
    {
        $jadwals = JadwalPeriksa::with('dokter')->get();
        $pasien = auth()->user()->pasien; // asumsi user terkait pasien

        return view('daftarpoli.create', compact('jadwals', 'pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal_periksas,id',
            'keluhan' => 'nullable|string',
        ]);

        $noAntrian = DaftarPoli::where('jadwal_id', $request->jadwal_id)->count() + 1;

        DaftarPoli::create([
            'pasien_id' => auth()->user()->pasien->id,
            'jadwal_id' => $request->jadwal_id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pendaftaran berhasil.');
    }
}
