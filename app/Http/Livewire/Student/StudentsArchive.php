<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentsArchive extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        //if search is empty, return all students else return students with search in full_name
        $students = Student::when($this->search, function ($query) {
            return $query->where('full_name', 'like', '%' . $this->search . '%');
        })->where('deleted', true)->paginate(20);
        return view('livewire.student.students-archive', compact('students'));
    }
}
