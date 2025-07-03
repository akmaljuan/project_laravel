@extends('layouts.app')

@section('title', 'Daftar Pasien untuk Diperiksa')

@section('content')
<div class="p-3">
    <h4>Daftar Pasien Belum Diperiksa</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Hari</th>
                <th>Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftars as $daftar)
            <tr>
                <td>{{ $daftar->pasien->nama }}</td>
                <td>{{ $daftar->keluhan }}</td>
                <td>{{ $daftar->jadwal->hari }}</td>
                <td>{{ $daftar->jadwal->jam_mulai }} - {{ $daftar->jadwal->jam_selesai }}</td>
                <td>
                    <a href="{{ route('dokter.periksa.edit', $daftar->id) }}" class="btn btn-sm btn-primary">Periksa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
