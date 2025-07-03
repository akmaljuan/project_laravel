@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Poli - Admin</h4>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>Poli</th>
                <th>Dokter</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Antrian</th>
                <th>Keluhan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($daftarPoli as $i => $dp)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $dp->pasien->nama }}</td>
                <td>{{ $dp->jadwal->poli->nama_poli }}</td>
                <td>{{ $dp->jadwal->dokter->nama }}</td>
                <td>{{ $dp->jadwal->hari }}</td>
                <td>{{ $dp->jadwal->jam_mulai }} - {{ $dp->jadwal->jam_selesai }}</td>
                <td>{{ $dp->no_antrian }}</td>
                <td>{{ $dp->keluhan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
