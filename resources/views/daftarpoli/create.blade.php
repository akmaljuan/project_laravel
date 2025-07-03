@extends('layout.app')

@section('title', 'Pendaftaran Poli')

@section('content')
<div class="container">
    <h3>Pendaftaran Poli</h3>
    <form action="{{ route('daftarpoli.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Jadwal Periksa</label>
            <select name="jadwal_id" class="form-control" required>
                @foreach($jadwals as $jadwal)
                    <option value="{{ $jadwal->id }}">
                        {{ $jadwal->hari }} - {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }} ({{ $jadwal->dokter->nama }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Daftar</button>
    </form>
</div>
@endsection
