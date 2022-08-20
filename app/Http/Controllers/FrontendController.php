<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function search(Request $request)
    {
        $users = Student::globalSearch($request->search)->get();
        dd($users);
    }
}
