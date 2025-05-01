@extends('layout.app')

@section('title', 'Riwayat Pemeriksaan')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Riwayat Pemeriksaan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Riwayat Pemeriksaan</li>
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

        @if ($periksas->isEmpty())
            <div class="alert alert-info">
                Belum ada riwayat pemeriksaan. <a href="{{ route('pasien.periksa.create') }}">Buat janji periksa sekarang</a>.
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Pemeriksaan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Dokter</th>
                                <th>Catatan</th>
                                <th>Total Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($periksas as $periksa)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d/m/Y H:i') }}</td>
                                    <td>{{ $periksa->dokter->nama ?? 'Dokter Tidak Ditemukan' }}</td>
                                
                                    <td>{{ $periksa->catatan ?? '-' }}</td>
                                    
                                    <td>Rp {{ number_format($periksa->biaya_pemeriksaan ?? 0, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection