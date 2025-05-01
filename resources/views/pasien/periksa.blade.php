@extends('layout.app')

@section('title', 'Buat Janji Periksa')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Buat Janji Periksa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Buat Janji Periksa</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Janji Periksa</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('pasien.periksa.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="id_dokter">Pilih Dokter</label>
                        <select name="id_dokter" id="id_dokter" class="form-control @error('id_dokter') is-invalid @enderror" required>
                            <option value="">-- Pilih Dokter --</option>
                            @if ($dokters->isEmpty())
                                <option value="" disabled>Tidak ada dokter tersedia</option>
                            @else
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}" {{ old('id_dokter') == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('id_dokter')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tgl_periksa">Tanggal Periksa</label>
                        <input type="datetime-local" name="tgl_periksa" id="tgl_periksa" class="form-control @error('tgl_periksa') is-invalid @enderror" value="{{ old('tgl_periksa') }}" required>
                        @error('tgl_periksa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="keluhan">Keluhan</label>
                        <textarea name="keluhan" id="keluhan" class="form-control @error('keluhan') is-invalid @enderror" rows="4" required>{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Buat Janji</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection