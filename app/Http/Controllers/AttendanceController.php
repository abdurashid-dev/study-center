<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attendance\AttendanceStoreRequest;
use App\Http\Services\AttendanceService;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    protected $service = AttendanceService::class;

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $groups = DB::table('groups')->select('name', 'slug')->get();
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
        return redirect()->route('attendance.index')->with('success', 'Davomat qilindi!');
    }

    public function show($slug)
    {
        $group = Group::with(array('students.student' => function ($query) {
            $query->where('deleted', false);
        }))->where('slug', $slug)->first();
//        dd($group);
        return view('admin.attendances.show', compact('group'));
    }

    public function edit($group)
    {
        $service = new $this->service();
        return $service->edit($group);
    }

    public function update($group, Request $request)
    {
//        dd($group, $request->all());
        $service = new $this->service();
        $service->update($group, $request->all());
        $group = Group::findOrFail($group);
        return redirect()->route('attendance.show', $group->slug)->with('success', 'Davomat tahrirlandi!');
    }
}
