<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\StudentBalance;
use App\Models\StudentPayment;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Carbon\Carbon;

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


        $months = [
            1 => "january",
            2 => "february",
            3 => "march",
            4 => "april",
            5 => "may",
            6 => "june",
            7 => "july",
            8 => "august",
            9 => "september",
            10 => "october",
            11 => "november",
            12 => "december",
        ];
        $amounts = [];
        foreach ($months as $key => $month){
            $amounts[$key] = StudentPayment::whereMonth('created_at', $key)->whereYear('created_at', Carbon::now()->year)->sum('payment');
            if (Carbon::now()->month == $key) {
                break;
            }
        }

        $line = (new LineChartModel())
            ->setTitle("To'lovlar")
            ->singleLine()
            ->setAnimated(true);
        foreach ($amounts as $key => $amount) {
            $line->addPoint($months[$key], $amount);
        }

        return view('dashboard', compact([
            'paymentForMonth',
            'studentsCount',
            'groupsCount',
            'unpaidStudentsCount',
            'unpaidStudentsPercent',
            'line',
        ]));
    }
}
