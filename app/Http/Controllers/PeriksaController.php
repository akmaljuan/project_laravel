<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    /**
     * Menampilkan form untuk membuat janji periksa (pasien).
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa', compact('dokters'));
    }

    /**
     * Menyimpan data janji periksa baru (pasien).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'keluhan' => 'required|string|max:1000',
            'tgl_periksa' => 'required|date_format:Y-m-d\TH:i',
        ], [
            'id_dokter.required' => 'Dokter wajib dipilih.',
            'id_dokter.exists' => 'Dokter tidak valid.',
            'keluhan.required' => 'Keluhan wajib diisi.',
            'keluhan.string' => 'Keluhan harus berupa teks.',
            'keluhan.max' => 'Keluhan maksimal 1000 karakter.',
            'tgl_periksa.required' => 'Tanggal pemeriksaan wajib diisi.',
            'tgl_periksa.date_format' => 'Format tanggal tidak valid.',
        ]);

        Periksa::create([
            'id_pasien' => Auth::id(),
            'id_dokter' => $request->id_dokter,
            'keluhan' => $request->keluhan,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => '',
            'biaya_pemeriksaan' => 150000,
        ]);;

        return redirect()->route('pasien.riwayat')
            ->with('success', 'Janji periksa berhasil dibuat.');
    }

    /**
     * Menampilkan daftar pemeriksaan untuk dokter.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $periksas = Periksa::with(['pasien', 'dokter'])
            ->where('id_dokter', Auth::id())
            ->get();

        return view('dokter.memeriksa', compact('periksas'));
    }

    /**
     * Menampilkan riwayat pemeriksaan untuk pasien.
     *
     * @return \Illuminate\View\View
     */
    public function riwayat()
    {
        $periksas = Periksa::with(['dokter', 'detail_periksa.obat'])
            ->where('id_pasien', Auth::id())
            ->orderBy('tgl_periksa', 'desc')
            ->get();

        return view('pasien.riwayat', compact('periksas'));
    }
}