<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm'];

    // Many-to-Many Relationship ke tabel poli lewat tabel pivot pasien_poli
    public function polis()
    {
        return $this->belongsToMany(Poli::class, 'pasien_poli');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
}
