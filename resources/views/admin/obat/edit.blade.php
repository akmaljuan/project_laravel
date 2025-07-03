@extends('layouts.app')

@section('title', 'Edit Obat')

@section('content')
<div class="container py-3">
    <h3>Edit Obat</h3>
    
    <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
            @error('nama_obat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="kemasan">Kemasan</label>
            <input type="text" name="kemasan" class="form-control @error('kemasan') is-invalid @enderror" value="{{ old('kemasan', $obat->kemasan) }}" required>
            @error('kemasan')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="harga">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $obat->harga) }}" required>
            @error('harga')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.obat') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
