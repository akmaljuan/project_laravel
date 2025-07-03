<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'no_hp', 'poli_id'];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function jadwalPeriksas()
    {
        return $this->hasMany(JadwalPeriksa::class);
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    
}
