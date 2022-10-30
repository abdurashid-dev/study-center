<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dtm\DtmRequest;
use App\Http\Services\DtmService;

class DtmController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new DtmService();
    }

    public function index()
    {
        $dtms = $this->service->index();
        return view('admin.dtms.index', compact('dtms'));
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
        $dtm = $this->service->show($dtm);
        dd($dtm);
        return view('admin.dtms.show', compact('dtm'));
    }
}
