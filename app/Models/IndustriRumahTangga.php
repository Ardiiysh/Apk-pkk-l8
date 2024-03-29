<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustriRumahTangga extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_industri_rumah_tangga';
    protected $fillable = [
        'is_user_id', 
        'kategori' ,
        'komoditi' ,
        'keterangan' ,
    ];
}
