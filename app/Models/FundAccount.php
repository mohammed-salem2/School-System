<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'description',
        'debit',
        'credit',
        'admin_data'
    ];

    protected $casts = [
        'admin_data' => 'array',
    ];
}
