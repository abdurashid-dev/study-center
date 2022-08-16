<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupStoreRequest;
use App\Http\Requests\Group\GroupUpdateRequest;
use App\Http\Services\GroupService;
use App\Models\Group;

class GroupController extends Controller
{
    protected GroupService $service;

    public function __construct()
    {
        $this->service = new GroupService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $group = new Group();
        return view('admin.groups.create', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GroupStoreRequest $request)
    {
        $this->service->store($request->all(), $request);
        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($slug)
    {
        $group = Group::with('students.student.phones')->with(array('students.student.payments' => function ($query) {
            //get this month payments and order by date
            $query->whereMonth('created_at', date('m'))->orderBy('created_at', 'desc');
        }))->where('slug', $slug)->first();
        $paymentOfThisMonth = 0;
        foreach ($group->students as $student) {
            foreach ($student->student->payments as $payment) {
                $paymentOfThisMonth += $payment->payment;
            }
        }
        return view('admin.groups.show', compact('group', 'paymentOfThisMonth'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($group)
    {
        $group = Group::where('slug', $group)->first();
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GroupUpdateRequest $request, Group $group): \Illuminate\Http\RedirectResponse
    {
        $this->service->update($request->all(), $group);
        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group): \Illuminate\Http\RedirectResponse
    {
        $this->service->destroy($group);
        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }
}
