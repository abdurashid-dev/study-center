<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'phone_number'];

    public function belongsTo()
    {
        return $this->belongsTo(Student::class);
    }
}
