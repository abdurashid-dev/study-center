<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'slug', 'description', 'status'];

    public function students(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StudentGroup::class);
    }

    public function attendance(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAttendanceStatusAttribute($group_id, $student_id)
    {
        $attendance = Attendance::where('group_id', $group_id)->where('student_id', $student_id)->latest()->limit(5)->get();
        if ($attendance) {
            return ($attendance);
        } else {
            return null;
        }
    }

    public function getAttendanceDivAttribute($status, $date)
    {
        if ($status == 0) {
            return '
            <div
                class="flex items-center justify-center h-6 w-6 rounded-full bg-red-500 dark:bg-red-800" style="background-color: #e22828 !important;" title="' . $date . '">
                <i class="fas fa-times"></i>
            </div>
            ';
        } elseif ($status == '1') {
            return '
            <div
                class="flex items-center justify-center h-6 w-6 rounded-full bg-green-500 dark:bg-green-800" style="background-color: green !important;" title="' . $date . '">
                <i class="fas fa-check"></i>
            </div>
            ';
        } elseif ($status == '2') {
            return '
            <div
                class="flex items-center justify-center h-6 w-6 rounded-full bg-yellow-500 dark:bg-yellow-800" title="' . $date . '">
                <i class="fas fa-question"></i>
            </div>
            ';
        } else {
            return '
            <div
                class="flex items-center justify-center h-6 w-6 rounded-full bg-yellow-500 dark:bg-yellow-800">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            ';
        }
    }
}
