@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Riwayat Periksa</h4>
    <div class="card card-primary">
        <div class="card-header">Riwayat Periksa</div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr><th>Nama Poli</th><td>{{ $daftar->jadwal->poli->nama_poli }}</td></tr>
                <tr><th>Nama Dokter</th><td>{{ $daftar->jadwal->dokter->nama }}</td></tr>
                <tr><th>Hari</th><td>{{ $daftar->jadwal->hari }}</td></tr>
                <tr><th>Mulai</th><td>{{ $daftar->jadwal->jam_mulai }}</td></tr>
                <tr><th>Selesai</th><td>{{ $daftar->jadwal->jam_selesai }}</td></tr>
                <tr><th>Nomor Antrian</th><td><span class="badge bg-success">{{ $daftar->no_antrian }}</span></td></tr>
            </table>

            @if($daftar->periksa)
            <p><strong>Tgl Periksa:</strong> {{ $daftar->periksa->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>Catatan:</strong> {{ $daftar->periksa->catatan }}</p>

            <h5>Daftar Obat:</h5>
            <ul>
                @foreach ($daftar->periksa->detailPeriksa as $detail)
                    <li>{{ $detail->obat->nama_obat }}</li>
                @endforeach
            </ul>
            @else
                <p class="text-danger">Belum ada data pemeriksaan.</p>
            @endif

            <a href="{{ route('pasien.dashboard') }}" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </div>
</div>
@endsection
