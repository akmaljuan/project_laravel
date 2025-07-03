@extends('layouts.app')
@section('title', 'Tambah Dokter')

@section('content')
<div class="container mt-4">
    <h4>Tambah Dokter</h4>
    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama">Nama Dokter</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poli_id">Poli</label>
            <select name="poli_id" class="form-control" required>
                <option value="">-- Pilih Poli --</option>
                @foreach($polis as $poli)
                    <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('dokter.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
