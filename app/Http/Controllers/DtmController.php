<?php

namespace App\Http\Controllers;

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
}
