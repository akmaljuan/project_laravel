@extends('layouts.app')
@section('title', 'Kelola Dokter')

@section('content')
<div class="container mt-4">
    <h4>Kelola Dokter</h4>
    <a href="{{ route('dokter.create') }}" class="btn btn-success mb-3">Tambah Dokter</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Poli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>{{ $dokter->poli->nama_poli ?? '-' }}</td>
                <td>
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
