<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriRuang extends Model
{
    use HasFactory;
    protected $table = 'galery_room';

    public function category()
    {
        return $this->belongsTo(CategoryRoom::class, 'room_id');
    }
}
