@extends('layouts.app')

@section('title', 'Form Pemeriksaan')

@section('content')
<div class="p-4">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Form Pemeriksaan Pasien</h5>
        </div>
        <div class="card-body">
            <h5 class="mb-3">Pasien: <strong>{{ $daftar->pasien->nama }}</strong></h5>

            <form action="{{ route('dokter.periksa.update', $daftar->id) }}" method="POST">
                @csrf

                {{-- Keluhan --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Keluhan</label>
                    <input type="text" class="form-control" value="{{ $daftar->keluhan }}" readonly>
                </div>

                {{-- Diagnosa --}}
                <div class="mb-3">
                    <label for="diagnosa" class="form-label fw-semibold">Diagnosa</label>
                    <textarea name="diagnosa" id="diagnosa" class="form-control" rows="3" required></textarea>
                </div>

                {{-- Obat --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Obat yang Diberikan</label>
                    <div class="row">
                        @foreach ($obats as $obat)
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="obat_id[]" value="{{ $obat->id }}" id="obat{{ $obat->id }}">
                                    <label class="form-check-label" for="obat{{ $obat->id }}">
                                        {{ $obat->nama_obat }} <small class="text-muted">(Rp{{ number_format($obat->harga, 0, ',', '.') }})</small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Biaya --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Biaya Pemeriksaan</label>
                    <p class="mb-0">Rp <strong>150.000</strong></p>
                </div>

                <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
            </form>
        </div>
    </div>
</div>
@endsection
