@extends('layouts.app')
@section('title', 'Dashboard Dokter')

@section('content')
<div class="container mt-4">
    <h4>Selamat Datang, {{ Auth::user()->nama }}</h4>
    <p>Ini adalah dashboard dokter.</p>
</div>
@endsection
