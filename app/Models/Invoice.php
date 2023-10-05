<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'grade_id',
        'classroom_id',
        'student_id',
        'fee_id',
        'description',
        'type',
        'admin_data'
    ];

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

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id' , 'id');
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class , 'fee_id' , 'id');
    }

}
