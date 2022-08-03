<?php

namespace App\Http\Services;

use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Support\Carbon;

class AttendanceService
{
    public function create($slug)
    {
        $group = Group::where('slug', $slug)->first();
        $attendance = Attendance::where('group_id', $group->id)->latest()->first();
        if ($attendance) {
            if (Carbon::parse($attendance->date)->format('Y-m-d') === Carbon::now()->format('Y-m-d')) {
                return redirect()->route('groups.index')->with('error', 'Bugun uchun davomat qilingan!');
            } else {
                $students = StudentGroup::query()
                    ->join('students', 'students.id', '=', 'student_groups.student_id')
                    ->where('student_groups.group_id', $group->id)
                    ->where('students.deleted', false)
                    ->get();
                return view('admin.attendances.create', compact('students', 'group'));
            }
        } else {
            $students = StudentGroup::query()
                ->join('students', 'students.id', '=', 'student_groups.student_id')
                ->where('student_groups.group_id', $group->id)
                ->where('students.deleted', false)
                ->get();
//            dd($students);
            return view('admin.attendances.create', compact('students', 'group'));
        }
    }

    public function store(array $data, $id)
    {
        $student_ids = array_keys($data['status']);
        foreach ($student_ids as $student_id) {
            $attendance = new \App\Models\Attendance();
            $attendance->student_id = $student_id;
            $attendance->group_id = $id;
            $attendance->status = $data['status'][$student_id];
            $attendance->comment = $data['comment'][$student_id];
            $attendance->date = now();
            $attendance->save();
        }
    }
}
