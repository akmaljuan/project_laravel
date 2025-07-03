@extends('layout.app')

@section('title', 'Dashboard Pasien')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Dashboard Pasien</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5>Selamat Datang, {{ auth()->user()->name }}</h5>
                <p>Silakan pilih menu di sidebar untuk melakukan pendaftaran ke poli.</p>
                <p>No. Rekam Medis Anda: <strong>{{ auth()->user()->pasien->no_rm }}</strong></p>
            </div>
        </div>
    </div>
</section>
@endsection
