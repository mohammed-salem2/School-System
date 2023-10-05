<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'admin_data',
    ];

    protected $casts = [
        'admin_data' => 'array' ,
    ];
}
