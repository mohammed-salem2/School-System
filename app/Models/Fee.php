<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'title',
        'amount',
        'grade_id',
        'classroom_id',
        'description',
        'year',
        'admin_data'
    ];

    public $translatable = ['title'];

    protected $casts = [
        'admin_data' => 'array' ,
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class , 'grade_id' , 'id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class , 'classroom_id' , 'id');
    }
}
