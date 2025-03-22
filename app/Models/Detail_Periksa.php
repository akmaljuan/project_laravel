<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_Periksa extends Model
{
    protected $fillable = [
        'id_periksa',
        'id_obat',
    ];


    public function periksa(){
        return $this->belongsTo(user::class, 'id_periksa');
    }
    
    public function obat(){
        return $this->belongsTo(user::class, 'id_obat');
    }
}
