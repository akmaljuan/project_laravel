@extends('layouts.app')

@section('title', 'Kelola Obat')

@section('content')
<div class="container py-3">
    <h3>Daftar Obat</h3>
    <a href="{{ route('admin.obat.create') }}" class="btn btn-primary mb-3">Tambah Obat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
            <tr>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('admin.obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.obat.destroy', $obat->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
