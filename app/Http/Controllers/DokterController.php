<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;
use App\Models\DaftarPoli;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('poli')->get();
        return view('dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();
        return view('dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'poli_id' => 'required|exists:polis,id',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        $polis = Poli::all();
        return view('dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'poli_id' => 'required|exists:polis,id',
        ]);

        $dokter->update($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }

    public function daftarPoli()
{
    $user = Auth::user();

    // Cek apakah user punya relasi ke dokter
    if (!$user->dokter) {
        abort(403, 'Akun ini tidak memiliki data dokter.');
    }

    $daftarPoli = DaftarPoli::with(['jadwal.dokter', 'jadwal.poli', 'pasien'])
        ->whereHas('jadwal', function ($query) use ($user) {
            $query->where('id_dokter', $user->dokter->id);
        })
        ->get();

    return view('dokter.daftar_poli', compact('daftarPoli'));
}

    public function profil()
{
    $dokter = auth()->user()->dokter;
    return view('dokter.profil', compact('dokter'));
}

public function updateProfil(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'no_hp' => 'required|string|max:20',
    ]);

    $dokter = auth()->user()->dokter;
    $dokter->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('dokter.profil')->with('success', 'Profil berhasil diperbarui.');
}
}
