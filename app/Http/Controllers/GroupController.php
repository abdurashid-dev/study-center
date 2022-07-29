<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\GroupStoreRequest;
use App\Http\Services\GroupService;
use App\Models\Group;
use Illuminate\Http\Request;

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
     * @param \App\Models\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return 'show';
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
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
