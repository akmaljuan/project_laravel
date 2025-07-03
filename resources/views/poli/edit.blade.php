@extends('layouts.app')

@section('title', 'Edit Poli')

@section('content')
<div class="container mt-4">
    <h1>Edit Poli</h1>

    <form action="{{ route('poli.update', $poli->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Poli</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama', $poli->nama) }}">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('poli.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
