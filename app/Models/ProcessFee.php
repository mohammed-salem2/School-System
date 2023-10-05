<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'amount',
        'description',
        'admin_data'
    ];


    protected $casts = [
        'admin_data' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
