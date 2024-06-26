<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasis';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name', 'time_event', 'achievement_level', 'description'
    ];
    
    public static $rules = [
        'name' => 'required',
        'achievement_level' => 'required|in:Lokal,Wilayah,Nasional,Internasional',
    ];
}
