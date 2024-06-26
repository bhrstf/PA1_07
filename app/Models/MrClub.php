<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MrClub extends Model
{
    use HasFactory;
    protected $table = 'mr_clubs';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'name',
        'description'
    ];
}
