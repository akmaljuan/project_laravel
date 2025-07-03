@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h4>Daftar Poli</h4>
    <div class="row">
        <!-- Form Pendaftaran -->
  <!-- Form Pendaftaran -->
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">Daftar Poli</div>
        <div class="card-body">
            <form action="{{ route('pasien.daftar-poli') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nomor Rekam Medis</label>
                    <input type="text" class="form-control" value="{{ auth()->user()->pasien->no_rm }}" readonly>
                </div>
                
                <div class="form-group">
                    <label>Pilih Jadwal</label>
                    <select name="jadwal_id" class="form-control" required>
                        @foreach($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}">
                                {{ $jadwal->poli->nama_poli }} - {{ $jadwal->dokter->nama }} ({{ $jadwal->hari }} {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Keluhan</label>
                    <textarea name="keluhan" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary w-100">Daftar</button>
            </form>
        </div>
    </div>
</div>


        <!-- Riwayat Pendaftaran -->
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">Riwayat Daftar Poli</div>
                <div class="card-body p-0">
                    <table class="table table-bordered table-hover m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Poli</th>
                                <th>Dokter</th>
                                <th>Hari</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Antrian</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daftarPoli as $i => $dp)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $dp->jadwal->poli->nama_poli }}</td>
                                    <td>{{ $dp->jadwal->dokter->nama }}</td>
                                    <td>{{ $dp->jadwal->hari }}</td>
                                    <td>{{ $dp->jadwal->jam_mulai }}</td>
                                    <td>{{ $dp->jadwal->jam_selesai }}</td>
                                    <td>{{ $dp->no_antrian }}</td>
                                    
                                    
                                    <td>
                                        <a href="{{ route('pasien.detail_periksa', $dp->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
