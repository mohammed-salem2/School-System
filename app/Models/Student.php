<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nationality_id',
        'blood_id',
        'religion_id',
        'classroom_id',
        'section_id',
        'grade_id',
        'parent_id',
        'date_birth',
        'status',
        'gender',
        'academic_year',
        'national_id',
        'image',
        'admin_data',
    ];

    public $translatable = [
        'name'
    ];

    protected $casts = [
        'admin_data' => 'array',
    ];


    public function getImageUrlAttribute()
    {
        if ($this->image == null) {
            return asset('admin/assets/images/avatars/student.png');
        } else if (stripos($this->image, 'http') === 0) {
            return $this->image;
        } else {
            return asset('storage/' . $this->image);
        }
    }


    public function getAgeStudentAttribute()
    {
        $date_birth = Carbon::parse($this->date_birth);
        $currentDate = Carbon::now();
        $age = $date_birth->diffInYears($currentDate);
        return $age;
    }

    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name'] ?? false) {
            $query->where('name', 'LIKE', "%{$request['name']}%");
        }
        // if ($request['grade_name'] ?? false) {
        //     $query->select('students.*', 'grades.name as grade_name')
        //         ->join('grades', 'students.grade_id', '=', 'grades.id')
        //         ->where('grades.name', 'LIKE', "%{$request['grade_name']}%");
        // }
        if ($request['status'] ?? false) {
            $query->where('status', 'LIKE', "%{$request['status']}%");
        }
        if (isset($request['status']) && $request['status'] != '') {
            $query->where('status', '=', $request['status']);
        }
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class, 'blood_id', 'id');
    }

    public function nationality()
    {
        return $this->belongsTo(nationality::class, 'nationality_id', 'id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(ChildParent::class, 'parent_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function student_accounts()
    {
        return $this->hasMany(StudentAccount::class, 'student_id', 'id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'student_id', 'id');
    }
}
