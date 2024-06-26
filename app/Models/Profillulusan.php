<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profillulusan extends Model
{
    use HasFactory;
    protected $table = 'profillulusans';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'name',
        'jobtitle',
        'description'
    ];
}
