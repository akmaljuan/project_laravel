@extends('layouts.app')

@section('title', 'Daftar Poli')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Poli</h1>

    <a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">+ Tambah Poli</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($polis as $index => $poli)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $poli->nama }}</td>
                <td>
                    <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Belum ada data poli.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
