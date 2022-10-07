<?php

namespace App\Http\Services;

use App\Models\Student;

class StudentPaymentService
{
    public function store(array $data)
    {
        $student = Student::with('payments', 'balance')->find($data['student_id']);
        $student->payments()->create([
            'payment' => $data['payment'],
            'discount' => $data['discount'],
            'comment' => $data['comment'],
        ]);

        //equal to 0 if discount null condition
        if (is_null($data['discount'])) {
            $data['discount'] = 0;
        }

        //update student balance
        $student->balance->update([
            'balance' => $student->balance->balance + ($data['payment'] + $data['discount']),
        ]);
    }
}
