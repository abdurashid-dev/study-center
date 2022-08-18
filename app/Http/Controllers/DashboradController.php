<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\StudentBalance;
use App\Models\StudentPayment;

class DashboradController extends Controller
{
    public function index()
    {
        $paymentForMonth = StudentPayment::whereMonth('created_at', now()->month)->sum('payment');
        $studentsCount = Student::where('deleted', false)->count();
        $groupsCount = Group::count();
        $unpaidStudentsCount = StudentBalance::query()
            ->join('students', 'students.id', '=', 'student_balances.student_id')
            ->where('students.deleted', false)
            ->where('student_balances.balance', '<', 0)
            ->count();
        if ($unpaidStudentsCount > 0) {
            $unpaidStudentsPercent = $unpaidStudentsCount / $studentsCount * 100;
        } else {
            $unpaidStudentsPercent = 0;
        }

        return view('dashboard', compact([
            'paymentForMonth',
            'studentsCount',
            'groupsCount',
            'unpaidStudentsCount',
            'unpaidStudentsPercent',
        ]));
    }
}
