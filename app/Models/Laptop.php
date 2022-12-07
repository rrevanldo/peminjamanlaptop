<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'region',
        'purposes',
        'ket',
        'date',
        'teacher',
        'status',
        'done_time',
    ];
}