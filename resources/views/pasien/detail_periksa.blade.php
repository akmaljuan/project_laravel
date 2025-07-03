@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Riwayat Periksa</h4>
    <div class="card card-primary">
        <div class="card-header">Detail Pemeriksaan</div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Nama Poli</th><td>{{ $daftar->jadwal->poli->nama_poli }}</td></tr>
                <tr><th>Nama Dokter</th><td>{{ $daftar->jadwal->dokter->nama }}</td></tr>
                <tr><th>Hari</th><td>{{ $daftar->jadwal->hari }}</td></tr>
                <tr><th>Jam Praktek</th><td>{{ $daftar->jadwal->mulai }} - {{ $daftar->jadwal->selesai }}</td></tr>
                <tr><th>Nomor Antrian</th><td><span class="badge bg-success">{{ $daftar->no_antrian }}</span></td></tr>
            </table>

            @if ($daftar->periksa)
                <hr>
                <table class="table table-bordered">
                    <tr><th>Tanggal Periksa</th><td>{{ $daftar->periksa->created_at->format('Y-m-d H:i:s') }}</td></tr>
                    <tr><th>Diagnosa / Catatan</th><td>{{ $daftar->periksa->catatan }}</td></tr>
                    <tr><th>Biaya Pemeriksaan</th><td>Rp{{ number_format($daftar->periksa->biaya_periksa, 0, ',', '.') }}</td></tr>
                </table>

                <h5 class="mt-3">Daftar Obat</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalObat = 0; @endphp
                        @foreach ($daftar->periksa->detailPeriksa as $detail)
                            <tr>
                                <td>{{ $detail->obat->nama_obat }}</td>
                                <td>Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                            </tr>
                            @php $totalObat += $detail->harga; @endphp
                        @endforeach
                    </tbody>
                </table>

                <h5 class="mt-3">Total Biaya</h5>
                <p><strong>Rp{{ number_format($daftar->periksa->total_biaya, 0, ',', '.') }}</strong></p>
            @else
                <p><strong>Belum ada data pemeriksaan untuk kunjungan ini.</strong></p>
            @endif
        </div>
    </div>
</div>
@endsection
