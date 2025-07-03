@extends('layouts.app')
@section('title', 'Kelola Poli')

@section('content')
<div class="container mt-4">
    <h4>Kelola Poli</h4>
    <a href="{{ route('admin.poli.create') }}" class="btn btn-success mb-3">Tambah Poli</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polis as $poli)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $poli->nama_poli }}</td>
                <td>{{ $poli->keterangan }}</td>
                <td>
                    <a href="{{ route('admin.poli.edit', $poli->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.poli.destroy', $poli->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
