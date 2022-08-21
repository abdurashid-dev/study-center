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
}
