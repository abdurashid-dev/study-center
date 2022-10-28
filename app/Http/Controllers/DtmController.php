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
    }
}
