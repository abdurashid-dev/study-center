<?php

namespace App\Http\Livewire\Group;

use App\Models\StudentGroup;
use Livewire\Component;

class GroupStudents extends Component
{
    public $group;
    public $search = '';

    public function mount($group)
    {
        $this->group = $group;
    }

    public function render()
    {
        $students = StudentGroup::query()
            ->where('group_id', $this->group->id)
            ->join('students', 'students.id', '=', 'student_groups.student_id')
            ->where('students.deleted', false)
            ->join('student_balances', 'students.id', '=', 'student_balances.student_id')
            //order by balance
            ->orderBy('student_balances.balance')
            ->select('students.*', 'student_balances.balance as balance')
            ->when($this->search, function ($query) {
                return $query->where('students.id', 'like', '%' . $this->search . '%')
                    ->orWhere('students.full_name', 'like', '%' . $this->search . '%');
            })
            ->paginate(20);
        return view('livewire.group.group-students', compact('students'));
    }
}
