<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class himamera extends Model
{
    use HasFactory;
    protected $table = 'himameras';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'activity_name',
        'content'
    ];
}
