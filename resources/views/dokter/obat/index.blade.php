@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Daftar Obat</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obats as $i => $obat)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->kemasan }}</td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
