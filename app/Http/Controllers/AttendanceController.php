<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attendance\AttendanceStoreRequest;
use App\Http\Services\AttendanceService;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class AttendanceController extends Controller
{
    protected $service = AttendanceService::class;

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $groups = DB::table('groups')->where('deleted', false)->select('name', 'slug')->get();
        return view('admin.attendances.index', compact('groups'));
    }

    public function create($slug)
    {
        $service = new $this->service();
        return $service->create($slug);
    }

    public function store(AttendanceStoreRequest $request, $id)
    {
        $service = new $this->service;
        $service->store($request->validated(), $id);
        return redirect()->route('groups.index')->with('success', 'Davomat qilindi!');
    }

    public function show($slug)
    {
        $group = Group::with('students.student')->where('slug', $slug)->first();
        return view('admin.attendances.show', compact('group'));
    }

    public function edit($group)
    {
        $service = new $this->service();
        return $service->edit($group);
    }

    public function update($group, Request $request)
    {
        dd($request->all());
        $service = new $this->service();
        $service->update($group, $request);
//        return redirect()->route('groups.index')->with('success', 'Davomat qilindi!');
    }
}
