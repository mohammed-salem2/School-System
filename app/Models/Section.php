<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Section extends Model
{
    use HasFactory , HasTranslations;


    protected $fillable = [
        'name',
        'slug',
        'status',
        'grade_id',
        'classroom_id',
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

    public function classroom()
    {
        return $this->belongsTo(Classroom::class , 'classroom_id' , 'id' );
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class , 'section_teachers');
    }

    public function students()
    {
        return $this->hasMany(Student::class , 'section_id' , 'id');
    }
}
