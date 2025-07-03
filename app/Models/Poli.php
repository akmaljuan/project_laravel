<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = ['nama_poli'];

    public function dokters()
    {
        return $this->hasMany(Dokter::class);
    }

    // Tambahan: relasi many-to-many ke pasien
    public function pasiens()
    {
        return $this->belongsToMany(Pasien::class, 'pasien_poli');
    }
}
