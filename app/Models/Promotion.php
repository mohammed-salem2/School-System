<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'from_grade',
        'from_classroom',
        'from_section',
        'to_grade',
        'to_classroom',
        'to_section',
        'academic_year_old' ,
        'academic_year_new',
    ];

    public function FromGrade()
    {
        return $this->belongsTo(Grade::class , 'from_grade' ,'id');
    }

    public function ToGrade()
    {
        return $this->belongsTo(Grade::class , 'to_grade' ,'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }

    public function FromClassroom()
    {
        return $this->belongsTo(Classroom::class , 'from_classroom' , 'id');
    }

    public function ToClassroom()
    {
        return $this->belongsTo(Classroom::class , 'to_classroom' , 'id');
    }

    public function FromSection()
    {
        return $this->belongsTo(Section::class , 'from_section' , 'id');
    }

    public function ToSection()
    {
        return $this->belongsTo(Section::class , 'to_section' , 'id');
    }
}
