<?php

namespace App\Http\Services;

use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use App\Models\StudentPhoneNumber;
use Illuminate\Support\Str;

class StudentService
{
    public function store(array $data)
    {
        $student = new Student();
        $student->slug = Str::random(10);
        $student->full_name = $data['full_name'];
        $student->address = $data['address'];
        $student->description = $data['description'];
        $student->save();

        foreach ($data['phones'] as $phone) {
            $phones = new StudentPhoneNumber();
            //check for null and write all phone numbers
            if ($phone != null) {
                $phones->phone_number = $phone;
                $phones->student_id = $student->id;
                $phones->save();
            }
        }

        foreach ($data['groups'] as $group) {
            $groups = new StudentGroup();
            $groups->student_id = $student->id;
            $groups->group_id = $group;
            $groups->save();
        }
    }
}
