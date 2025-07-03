@extends('layouts.app')

@section('title', 'Tambah Jadwal Periksa')

@section('content')
<div class="container mt-3">
    <h4>Tambah Jadwal Periksa</h4>
    <form action="{{ route('dokter.jadwal.store') }}" method="POST">
        @csrf
        <div class="form-group">
    <label>Poli</label>
    <select name="poli_id" class="form-control" required>
        <option value="">-- Pilih Poli --</option>
        @foreach($polis as $poli)
            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('dokter.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

