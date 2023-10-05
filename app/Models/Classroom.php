<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Classroom extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'name',
        'grade_id',
        'slug',
        'admin_data',
    ];

    public $translatable = ['name'];

    protected $casts = [
        'admin_data' => 'array' ,
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class , 'grade_id' , 'id' );
    }

    public function sections()
    {
        return $this->hasMany(Section::class , 'classroom_id' , 'id');
    }
}
