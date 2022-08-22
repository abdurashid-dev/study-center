<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function search(Request $request)
    {
        if ($request->q) {
            $q = $request->get('q');
            $students = Student::globalSearch($request->q)->get();
            return view('frontend.search', compact('students', 'q'));
        } else {
            return redirect()->route('welcome');
        }
    }

    public function dtm()
    {
        return view('frontend.dtm');
    }

    public function info()
    {
        return view('frontend.info');
    }

    public function result($student)
    {
        $student = Student::with('groups', 'phones', 'balance')
            //last 7 attendances
            ->with(['attendances' => function ($query) {
                $query->orderBy('date', 'desc')->limit(7);
            }])
            //last 3 months payments
            ->with(['payments' => function ($query) {
                $query->where('created_at', '>=', now()->subMonths(3))->orderBy('created_at', 'desc');
            }])
            ->where('slug', $student)->first();
        return view('frontend.result', compact('student'));
    }
}
