<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaGudang extends Model
{
    use HasFactory;
    
    protected $fillable = ['id_warehouse', 'nama_area', 'status'];

    public function rak()
    {
        return $this->hasMany(Rak::class, 'id_area');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'id_warehouse');
    }
}