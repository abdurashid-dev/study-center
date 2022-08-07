<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StudentStoreRequest;
use App\Http\Requests\Student\StudentUpdateRequest;
use App\Http\Services\StudentService;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new StudentService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $groups = Group::where('status', 1)->where('deleted', 0)->get();
        if ($groups->count() == 0) {
            return redirect()->route('students.index')->with('error', 'Guruhlar mavjud emas! Avval guruh qo\'shishingiz kerak!');
        }
        return view('admin.students.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StudentStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->service->store($request->validated());
        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $student = Student::with('phones', 'groups.group', 'balance')->where('slug', $slug)->first();
        $student_payments = $student->payments()->orderByDesc('created_at')->get();
        $attendances = Attendance::where('student_id', $student->id)->orderByDesc('created_at')->paginate(10);
        return view('admin.students.show', compact('student', 'attendances', 'student_payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($slug)
    {
        //student with phones and groups
        $student = Student::where('slug', $slug)->with('phones', 'groups')->first();
        $groups = Group::where('status', 1)->where('deleted', 0)->get();
        return view('admin.students.edit', compact('student', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StudentUpdateRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->service->destroy($id);
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
