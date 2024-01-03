<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_area',
        'nama_rak',
        'status'
    ];

    public function area()
    {
        return $this->belongsTo(AreaGudang::class, 'id_area');
    }

}
