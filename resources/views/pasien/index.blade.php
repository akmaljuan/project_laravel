@extends('layout.app')

@section('title', 'Dashboard Pasien')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Pasien</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('pasien.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Selamat Datang, {{ auth()->user()->nama }}</h3>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di dashboard pasien. Anda dapat membuat janji periksa atau melihat riwayat periksa dari menu sidebar.</p>
                        <div class="mt-3">
                            <a href="{{ route('pasien.periksa.create') }}" class="btn btn-primary">Buat Janji Periksa</a>
                            <a href="{{ route('pasien.riwayat') }}" class="btn btn-info">Lihat Riwayat Periksa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection