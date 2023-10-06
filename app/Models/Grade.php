<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Grade extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'name',
        'note',
        'admin_data'
    ];

    public $translatable = ['name'];

    protected $casts = [
        'admin_data' => 'array' ,
    ];

    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name'] ?? false) {
            $query->where('name', 'LIKE', "%{$request['name']}%");
        }
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class , 'grade_id' , 'id');
    }

    public function sections()
    {
        return $this->hasMany(Section::class , 'grade_id' , 'id');
    }
}
