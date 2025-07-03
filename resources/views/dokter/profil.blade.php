@extends('layouts.app')

@section('title', 'Profil Dokter')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Profil Dokter</h4>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('dokter.profil.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $dokter->nama) }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $dokter->no_hp) }}" required>
                </div>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
