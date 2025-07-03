@extends('layouts.app')

@section('title', 'Edit Jadwal Periksa')

@section('content')
<div class="container mt-3">
    <h4>Edit Jadwal Periksa</h4>
    <form action="{{ route('dokter.jadwal.update', $jadwal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Hari</label>
            <input type="text" name="hari" class="form-control" value="{{ $jadwal->hari }}" required>
        </div>
        <div class="form-group">
            <label>Jam Mulai</label>
            <input type="time" name="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
        </div>
        <div class="form-group">
            <label>Jam Selesai</label>
            <input type="time" name="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
        </div>
        <div class="form-group mt-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="1" {{ $jadwal->status ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ !$jadwal->status ? 'selected' : '' }}>Tidak Aktif</option>
    </select>
</div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('dokter.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
