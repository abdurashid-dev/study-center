<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupTimeRequest;
use App\Http\Services\GroupTimeService;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupTimeController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new GroupTimeService();
    }

    public function index()
    {
        $groups = $this->service->index();
        return view('admin.groups.calendar.index', compact('groups'));
    }

    public function edit($slug)
    {
        $group_times = $this->service->edit($slug);
        $group = Group::where('slug', $slug)->first();
//        dd($group_times->day);
        return view('admin.groups.calendar.edit', compact('group', 'group_times'));
    }

    public function update(GroupTimeRequest $request, $id)
    {
//        dd($request->validated());
        $this->service->update($request->validated(), $id);
        return redirect()->route('groups-times.index');
    }
}
