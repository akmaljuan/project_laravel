<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPeriksa extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',     // ID dokter yang bertugas
        'poli_id',
        'hari',          // Hari jadwal
        'jam_mulai',     // Jam mulai
        'jam_selesai',   // Jam selesai
        'status',
        
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function daftarPolis()
    {
        return $this->hasMany(DaftarPoli::class, 'jadwal_id');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli_id');
    }
}
