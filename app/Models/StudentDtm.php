<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDtm extends Model
{
    use HasFactory;

    protected $fillable = ['dtm_id', 'student_id', 'count_answers'];
}
