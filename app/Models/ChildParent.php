<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class ChildParent extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'email',
        'password',
        'name_father',
        'national_id_father',
        'passport_id_father',
        'phone_father',
        'job_father',
        'nationality_father_id',
        'blood_father_id',
        'religion_father_id',
        'address_father',
        'name_mother',
        'national_id_mother',
        'passport_id_mother',
        'phone_mother',
        'job_mother',
        'nationality_mother_id',
        'blood_mother_id',
        'religion_mother_id',
        'address_mother',
        'admin_data'
    ];

    public $translatable = [
        'name_father' ,
        'job_father',
        'name_mother',
        'job_mother',
    ];

    protected $casts = [
        'admin_data' => 'array' ,
    ];


    public function scopeSearch(Builder $query, $request)
    {
        if ($request['name_father'] ?? false) {
            $query->where('name_father', 'LIKE', "%{$request['name_father']}%");
        }
        if ($request['name_mother'] ?? false) {
            $query->where('name_mother', 'LIKE', "%{$request['name_mother']}%");
        }
    }

    public function scopeActive(Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function blood()
    {
        return $this->belongsTo(Blood::class , 'blood_father_id' , 'blood_mother_id' , 'id');
    }

    public function nationality()
    {
        return $this->belongsTo(nationality::class , 'nationality_father_id' , 'nationality_mother_id' , 'id');
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class , 'religion_father_id' , 'religion_mother_id' , 'id');
    }
}
