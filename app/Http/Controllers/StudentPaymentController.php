<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Request;

class StudentPaymentController extends Controller
{
    public function index()
    {
        return view('admin.payments.index');
    }

    public function create()
    {
        $students = Student::where('deleted', false)->get();
        return view('admin.payments.create', compact('students'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
