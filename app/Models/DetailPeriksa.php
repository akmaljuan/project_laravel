<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeriksa extends Model
{
    use HasFactory;

    protected $fillable = ['periksa_id', 'obat_id', 'harga'];

public function periksa()
{
    return $this->belongsTo(Periksa::class);
}



    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
