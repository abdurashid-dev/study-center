<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentPaymentRequest;
use App\Http\Services\StudentPaymentService;
use App\Models\Student;

class StudentPaymentController extends Controller
{
    protected string $service = StudentPaymentService::class;

    public function index()
    {
        return view('admin.payments.index');
    }

    public function create()
    {
        $students = Student::where('deleted', false)->get();
        return view('admin.payments.create', compact('students'));
    }

    public function store(StudentPaymentRequest $request)
    {
        $service = new $this->service;
        $service->store($request->validated());
        return redirect()->route('payment.index')->with('success', 'To`lov qilindi!');
    }
}
