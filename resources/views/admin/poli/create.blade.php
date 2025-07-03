@extends('layouts.app')

@section('title', 'Tambah Poli')

@section('content')
<div class="container mt-4">
    <h4>Tambah Poli</h4>
    <form action="{{ route('admin.poli.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Poli</label>
            <input type="text" name="nama_poli" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.poli') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
