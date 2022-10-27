<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtm extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'group_id', 'student_id', 'count_tests', 'correct_answers'];
}
