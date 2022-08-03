<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function create($slug)
    {
        $group = Group::where('slug', $slug)->first();
        $students = Student::query()
            ->join('student_groups', 'student_groups.student_id', '=', 'students.id')
            ->where('students.deleted', false)
            ->get();
        return view('admin.attendances.create', compact('students', 'group'));
    }

    public function store(Request $request, $id)
    {
        dd($request->all());
    }
}
