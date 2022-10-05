<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use DB;
use Livewire\Component;

class UnpaidStudentComponent extends Component
{
    public function render()
    {
        $students = Student::join('student_groups', 'student_groups.student_id', 'students.id')
            ->join('groups', function ($join) {
                $join->on('groups.id', '=', \Illuminate\Support\Facades\DB::raw('student_groups.student_id AND student_groups.id = (SELECT MAX(id) FROM student_groups WHERE student_id = students.id)'));
            })
            ->join('student_phone_numbers', function ($join) {
                $join->on('students.id', '=', \Illuminate\Support\Facades\DB::raw('student_phone_numbers.student_id AND student_phone_numbers.id = (SELECT MAX(id) FROM student_phone_numbers WHERE student_id = students.id)'));
            })
            ->join('student_balances', function ($query) {
                $query->on('student_balances.student_id', 'students.id')
                    ->where('student_balances.balance', '<', 0);
            })
            ->select('students.*', 'groups.name as group_name', 'student_phone_numbers.phone_number as phone_number', 'student_balances.balance as balance')
            ->paginate(20);
//        dd($students);
        return view('livewire.student.unpaid-student-component', compact('students'));
    }
}
