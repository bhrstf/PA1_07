<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturDosen extends Model
{
    use HasFactory;
    protected $table = 'struktur_dosens';
    protected $primaryKey = 'id';
}
