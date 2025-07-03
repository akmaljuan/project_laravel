<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalPeriksa;
use App\Models\Poli;


class JadwalPeriksaController extends Controller
{
    // Menampilkan semua jadwal milik dokter yang login
    public function index()
    {
        
        $dokter = auth()->user()->dokter;
        $jadwals = JadwalPeriksa::where('dokter_id', $dokter->id)->with('poli')->get();

        return view('dokter.jadwal.index', compact('jadwals'));
    }

    // Menampilkan form untuk membuat jadwal baru
    public function create()
    {
        $polis = Poli::all();
        return view('dokter.jadwal.create', compact('polis'));
    }

    // Menyimpan data jadwal baru
    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'poli_id' => 'required|exists:polis,id',
        ]);

        JadwalPeriksa::create([
            'dokter_id' => auth()->user()->dokter->id,
            'poli_id' => $request->poli_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
         
        ]);

        return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // Menampilkan form edit untuk jadwal tertentu
    public function edit(JadwalPeriksa $jadwal)
    {
        $polis = Poli::all();
        return view('dokter.jadwal.edit', compact('jadwal', 'polis'));
    }

    // Memperbarui data jadwal
   // app/Http/Controllers/JadwalPeriksaController.php (atau controller terkait)

public function update(Request $request, $id)
{
    $request->validate([
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
        'status' => 'required|boolean',
    ]);

    $jadwal = JadwalPeriksa::findOrFail($id);

    // Jika ingin mengaktifkan, nonaktifkan semua jadwal lain milik dokter ini terlebih dahulu
    if ($request->status == 1) {
        JadwalPeriksa::where('dokter_id', $jadwal->dokter_id)
            ->update(['status' => 0]);
    }

    $jadwal->update([
        'hari' => $request->hari,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'status' => $request->status,
    ]);

    return redirect()->route('dokter.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
}

}
