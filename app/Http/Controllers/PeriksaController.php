<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use App\Models\DaftarPoli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriksaController extends Controller
{
    public function index()
    {
        $dokter = auth()->user()->dokter;
        $daftars = DaftarPoli::with(['pasien', 'jadwal'])
            ->whereHas('jadwal', function ($q) use ($dokter) {
                $q->where('dokter_id', $dokter->id);
            })
            ->whereDoesntHave('periksa')
            ->get();

        return view('dokter.periksa.index', compact('daftars'));
    }

    public function edit($id)
    {
        $daftar = DaftarPoli::with('pasien', 'jadwal')->findOrFail($id);
        $obats = Obat::all();
        return view('dokter.periksa.edit', compact('daftar', 'obats'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'diagnosa' => 'required',
        'obat_id' => 'required|array|min:1',
    ]);

    DB::beginTransaction();

    try {
        $periksa = Periksa::create([
            'daftar_poli_id' => $id,
            'tgl_periksa' => now(),
            'catatan' => $request->diagnosa,
            'biaya_periksa' => 150000,
        ]);

        $totalObat = 0;

        foreach ($request->obat_id as $obatId) {
            $obat = Obat::find($obatId);

            // ⛳ Taruh di sini!
            

            $totalObat += $obat->harga;

            DetailPeriksa::create([
                'periksa_id' => $periksa->id,
                'obat_id' => $obatId,
                'harga' => $obat->harga,
            ]);
            
        }

        $periksa->total_biaya = 150000 + $totalObat;
        $periksa->save();

        


        DB::commit();
        return redirect()->route('dokter.periksa.index')->with('success', 'Data pemeriksaan berhasil disimpan.');
    } catch (\Exception $e) {
        DB::rollback();
        \Log::error('Gagal menyimpan periksa: ' . $e->getMessage());

    return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan. ' . $e->getMessage());

    }
}

    
    public function riwayat()
{
    $dokter = Dokter::where('user_id', auth()->id())->first();

    if (!$dokter) {
        return redirect()->back()->with('error', 'Data dokter tidak ditemukan.');
    }

    $riwayat = Periksa::with(['daftarPoli.pasien', 'daftarPoli.jadwal'])
        ->whereHas('daftarPoli.jadwal', function ($query) use ($dokter) {
            $query->where('dokter_id', $dokter->id);
        })
        ->orderByDesc('tgl_periksa')
        ->get();

    return view('dokter.periksa.riwayat', compact('riwayat'));
}

}
