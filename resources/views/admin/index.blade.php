@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Admin</h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Menu Admin</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="{{ route('admin.dokter') }}" class="btn btn-primary btn-block">Kelola Dokter</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.pasien') }}" class="btn btn-primary btn-block">Kelola Pasien</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.poli') }}" class="btn btn-primary btn-block">Kelola Poli</a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.obat') }}" class="btn btn-primary btn-block">Kelola Obat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection