<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsArchive extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Student::where('deleted', true)->paginate();
        return view('livewire.student.students-archive', compact('students'));
    }
}
