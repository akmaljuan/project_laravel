@extends('layouts.app')
@section('title', 'Edit Dokter')

@section('content')
<div class="container mt-4">
    <h4>Edit Dokter</h4>
    <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="nama">Nama Dokter</label>
            <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ $dokter->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}" required>
        </div>
        <div class="mb-3">
            <label for="poli_id">Poli</label>
            <select name="poli_id" class="form-control" required>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}" {{ $dokter->poli_id == $poli->id ? 'selected' : '' }}>
                        {{ $poli->nama_poli }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
