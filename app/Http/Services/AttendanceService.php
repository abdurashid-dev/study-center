<?php

namespace App\Http\Services;

use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceService
{
    public function create($slug)
    {
        $group = Group::where('slug', $slug)->first();
        $attendance = Attendance::where('group_id', $group->id)->latest()->first();
        if ($attendance) {
            if (Carbon::parse($attendance->date)->format('Y-m-d') === Carbon::now()->format('Y-m-d')) {
                return redirect()->route('attendance.index')->with('error', 'Bugun uchun davomat qilingan!');
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
        $this->attendance_store($data, $id);
    }

    public function edit($group)
    {
        $students = StudentGroup::query()
            ->join('students', 'students.id', '=', 'student_groups.student_id')
            ->join('attendances', function ($join) use ($group) {
                $join->on('attendances.student_id', '=', 'student_groups.student_id')
                    ->where('attendances.group_id', '=', $group)
                    ->where('attendances.date', '=', DB::raw('(SELECT MAX(date) FROM attendances WHERE group_id = ' . $group . ')'));
            })
            ->where('students.deleted', false)
            ->select('students.full_name as full_name', 'students.id as id', 'attendances.id as attendance_id', 'attendances.status as attendance_status', 'attendances.comment as attendance_comment', 'attendances.date as attendance_date')
            ->get();
        $group = Group::findOrFail($group);
        return view('admin.attendances.edit', compact('students', 'group'));
    }

    public function update($id, array $data)
    {
        foreach ($data['attendance_id'] as $attendance) {
            $attendance = Attendance::findOrFail($attendance);
            $attendance->delete();
        }
        $this->attendance_store($data, $id);
    }

    /**
     * @param array $data
     * @param $id
     * @return void
     */
    public function attendance_store(array $data, $id): void
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
