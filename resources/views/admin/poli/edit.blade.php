@extends('layouts.app')
@section('title', 'Edit Poli')

@section('content')
<div class="container mt-4">
    <h4>Edit Poli</h4>
    <form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Poli</label>
            <input type="text" name="nama_poli" value="{{ $poli->nama_poli }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $poli->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.poli') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
