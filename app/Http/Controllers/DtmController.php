<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dtm\DtmRequest;
use App\Http\Requests\Dtm\StudentDtmRequest;
use App\Http\Services\DtmService;
use Illuminate\Http\Request;

class DtmController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new DtmService();
    }

    public function index()
    {
//        $dtms = $this->service->index();
        return view('admin.dtms.index');
    }

    public function create()
    {
        [$dtm, $groups] = $this->service->create();
        return view('admin.dtms.create', compact('dtm', 'groups'));
    }

    public function store(DtmRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('dtm.index')->with('success', 'DTM qo`shildi!');
    }

    public function edit($dtm)
    {
        [$dtm, $groups] = $this->service->edit($dtm);
        return view('admin.dtms.edit', compact('dtm', 'groups'));
    }

    public function update(DtmRequest $request, $id)
    {
        $this->service->update($request->validated(), $id);
        return redirect()->route('dtm.index')->with('success', 'DTM tahrirlandi!');
    }

    public function show($dtm)
    {
        [$dtm, $students] = $this->service->show($dtm);
        return view('admin.dtms.show', compact('dtm', 'students'));
    }

    public function studentDtmCreate($slug)
    {
        [$dtm, $students] = $this->service->studentDtmCreate($slug);
        return view('admin.dtms.student-dtm-create', compact('dtm', 'students'));
    }

    public function studentDtmStore(StudentDtmRequest $request, $dtm, $group = null)
    {
        $this->service->studentDtmStore($request->validated(), $dtm, $group);
        return redirect()->route('dtm.show', $dtm)->with('success', 'Created!');
    }

    public function studentDtmEdit($student_id, $slug)
    {
        $response = $this->service->studentDtmEdit($slug, $student_id);
        return view('admin.dtms.student-dtm-edit', compact('response'));
    }

    public function studentDtmUpdate(Request $request, $dtm, $student)
    {
        $data = $request->validate([
            'count_answers' => 'required'
        ]);
        $this->service->studentDtmUpdate($data, $dtm, $student);
        return redirect()->route('dtm.show', $dtm)->with('success', 'Updated!');
    }
}
