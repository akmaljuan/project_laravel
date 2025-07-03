@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Pasien ke Poli Saya</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Poli</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Keluhan</th>
                <th>No. Antrian</th>
                <th>Aksi</th> {{-- Tambahkan kolom aksi --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarPoli as $i => $dp)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $dp->pasien->nama }}</td>
                <td>{{ $dp->jadwal->poli->nama_poli }}</td>
                <td>{{ $dp->jadwal->hari }}</td>
                <td>{{ $dp->jadwal->jam_mulai }} - {{ $dp->jadwal->jam_selesai }}</td>
                <td>{{ $dp->keluhan }}</td>
                <td>{{ $dp->no_antrian }}</td>
                <td>
                    <a href="{{ route('dokter.memeriksa', ['id' => $dp->id]) }}" class="btn btn-sm btn-primary">
                        Periksa
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
