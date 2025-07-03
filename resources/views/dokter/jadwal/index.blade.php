@extends('layouts.app')
@section('title', 'Jadwal Periksa')

@section('content')
<div class="container mt-3">
    <h4>Jadwal Periksa</h4>
    <a href="{{ route('dokter.jadwal.create') }}" class="btn btn-primary mb-3">+ Tambah Jadwal Periksa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jadwals as $jadwal)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jadwal->hari }}</td>
                <td>{{ $jadwal->jam_mulai }}</td>
                <td>{{ $jadwal->jam_selesai }}</td>
                <td>
    @if($jadwal->status)
        <span class="badge bg-success">Aktif</span>
    @else
        <span class="badge bg-secondary">Tidak Aktif</span>
    @endif
</td>

                <td>
                    <a href="{{ route('dokter.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada jadwal.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
