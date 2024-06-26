<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;
    protected $table = 'laboratoria';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'lab_name',
        'content'
    ];
}
