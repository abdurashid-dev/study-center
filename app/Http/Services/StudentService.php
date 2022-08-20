<?php

namespace App\Http\Services;

use App\Models\Student;
use App\Models\StudentBalance;
use App\Models\StudentGroup;
use App\Models\StudentPhoneNumber;
use Illuminate\Support\Str;

class StudentService
{
    public function store(array $data)
    {
        $student = new Student();
        $student->slug = Str::random(10);
        $student->full_name = ucwords($data['full_name']);
        $student->address = $data['address'];
        $student->description = $data['description'];
        $student->save();

        $student_balance = new StudentBalance();
        $student_balance->student_id = $student->id;
        $student_balance->balance = 0;
        $student_balance->save();

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

    public function update(array $data, $id): void
    {
        $student = Student::findOrFail($id);
        $student->full_name = $data['full_name'];
        $student->address = $data['address'];
        $student->description = $data['description'];
        $student->save();

        $phones = StudentPhoneNumber::where('student_id', $id)->get();
        foreach ($phones as $phone) {
            $phone->delete();
        }
        foreach ($data['phones'] as $phone) {
            $phones = new StudentPhoneNumber();
            //check for null and write all phone numbers
            if ($phone != null) {
                $phones->phone_number = $phone;
                $phones->student_id = $student->id;
                $phones->save();
            }
        }

        $groups = StudentGroup::where('student_id', $id)->get();
        foreach ($groups as $group) {
            $group->delete();
        }
        foreach ($data['groups'] as $group) {
            $groups = new StudentGroup();
            $groups->student_id = $student->id;
            $groups->group_id = $group;
            $groups->save();
        }
    }

    public function destroy($id): void
    {
        $student = Student::findOrFail($id);
        $groups = StudentGroup::where('student_id', $id)->get();
        foreach ($groups as $group) {
            $group->delete();
        }
        $student->deleted_at = now();
        $student->deleted = true;
        $student->save();
    }

    public function restore($student): void
    {
        $student = Student::findOrFail($student);
        $student->deleted_at = null;
        $student->deleted = false;
        $student->save();
    }
}
