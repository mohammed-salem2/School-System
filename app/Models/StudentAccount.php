<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'invoice_id',
        'receipt_id',
        'process_id',
        'payment_id',
        'type',
        'description',
        'debit',
        'credit',
        'admin_data'
    ];

    protected $casts = [
        'admin_data' => 'array',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'id');
    }

    public function receipt()
    {
        return $this->belongsTo(ReceiptStudent::class, 'receipt_id', 'id');
    }
}
