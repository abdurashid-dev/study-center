<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;

class StudentComponent extends Component
{
    public string $search = '';

    public function render()
    {
        $students = Student::search($this->search)->with('phones', 'groups.group')->where('deleted', 0)->orderByDesc('created_at')->paginate(20);
        return view('livewire.student.student-component', compact('students'));
    }
}
