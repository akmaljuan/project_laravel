@extends('layouts.app') 
@section('title', 'Kelola Pasien')

@section('content')
<div class="container">
    <h1>Kelola Pasien</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.pasien.store') }}" method="POST">
    @csrf

    <h5>Data Akun User</h5>
<div class="form-group">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" required> 
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
</div>
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
</div>


    <hr>
<h5>Data Pasien</h5>
<div class="form-group">
    <label>Nama Pasien</label>
    <input type="text" name="nama_pasien" class="form-control" required>
</div>
<div class="form-group">
    <label>No KTP</label>
    <input type="text" name="no_ktp" class="form-control" required>
</div>
<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" required>
</div>
<div class="form-group">
    <label>No HP</label>
    <input type="text" name="no_hp" class="form-control" required>
</div>


    <button class="btn btn-primary mt-2">Tambah Pasien</button>
</form>


    <hr>

    <h3>Daftar Pasien</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No RM</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $i => $pasien)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $pasien->user->name }}</td> {{-- pakai "name", bukan "nama" --}}
                <td>{{ $pasien->user->email }}</td>
                <td>{{ $pasien->no_rm }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->no_hp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
