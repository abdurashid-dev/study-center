<?php

namespace App\Http\Controllers;

use App\Http\Services\GroupTimeService;
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
}
