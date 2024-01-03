<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota',
        'nama_warehouse',
        'alamat',
        'pic',
        'nomor_hp_pic',
        'owner',
        'status'
    ];

    public function area()
    {
        return $this->hasMany(AreaGudang::class, 'id_warehouse');
    }
}
