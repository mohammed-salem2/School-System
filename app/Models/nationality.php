<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class nationality extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'admin_data',
    ];

    public $translatable = ['name'];

    protected $casts = [
        'admin_data' => 'array' ,
    ];
}
