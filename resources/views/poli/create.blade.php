@extends('layouts.app')

@section('title', 'Tambah Poli')

@section('content')
<div class="container mt-4">
    <h1>Tambah Poli</h1>

    <form action="{{ route('poli.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Poli</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
