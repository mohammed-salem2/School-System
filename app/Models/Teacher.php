<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory , HasTranslations;

    protected $fillable = [
        'name',
        'email',
        'password',
        'specialization_id',
        'status',
        'gender',
        'joining_date',
        'address',
        'image',
        'admin_data',
    ];

    public $translatable = ['name'];

    protected $casts = [
        'admin_data' => 'array' ,
    ];


    public function getImageUrlAttribute()
    {
        if($this->image == null){
            return asset('admin/assets/images/avatars/avatar-5.png');
        }
        else if(stripos($this->image , 'http') === 0)
        {
            return $this->image;
        }else{
            return asset('storage/' . $this->image);
        }
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class , 'specialization_id' , 'id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class . 'section_teachers');
    }
}
