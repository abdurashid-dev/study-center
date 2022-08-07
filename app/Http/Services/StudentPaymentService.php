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
            'comment' => $data['comment'],
        ]);
        $student->balance->update([
            'balance' => $student->balance->balance + $data['payment'],
        ]);
    }
}
