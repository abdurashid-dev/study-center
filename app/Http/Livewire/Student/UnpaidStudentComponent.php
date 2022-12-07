<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class UnpaidStudentComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Student::
        join('student_phone_numbers', function ($join) {
            $join->on('students.id', '=', \Illuminate\Support\Facades\DB::raw('student_phone_numbers.student_id AND student_phone_numbers.id = (SELECT MAX(id) FROM student_phone_numbers WHERE student_id = students.id)'));
        })
            ->join('student_balances', function ($query) {
                $query->on('student_balances.student_id', 'students.id')
                    ->where('student_balances.balance', '<', 0);
            })
            ->select('students.*', 'student_phone_numbers.phone_number as phone_number', 'student_balances.balance as balance')
            ->simplePaginate(10);
        return view('livewire.student.unpaid-student-component', compact('students'));
    }
}
