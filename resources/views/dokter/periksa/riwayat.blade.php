@extends('layouts.app')

@section('title', 'Riwayat Pasien')

@section('content')
<div class="container mt-4">
    <h4>Riwayat Pemeriksaan Pasien</h4>

    <table class="table table-bordered table-hover">
       <thead class="thead-light">
    <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Poli</th>
        <th>Tanggal Periksa</th>
        <th>Catatan</th>
        <th>Biaya Pemeriksaan</th>
        <th>Total Biaya</th> {{-- Tambahan --}}
    </tr>
</thead>
        <<tbody>
    @foreach($riwayat as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->daftarPoli->pasien->nama ?? '-' }}</td>
            <td>{{ $item->daftarPoli->jadwal->poli->nama_poli ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tgl_periksa)->format('d-m-Y H:i') }}</td>
            <td>{{ $item->catatan }}</td>
            <td>Rp{{ number_format($item->biaya_periksa, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($item->total_biaya, 0, ',', '.') }}</td> {{-- Tambahan --}}
        </tr>
    @endforeach
</tbody>
    </table>
</div>
@endsection
