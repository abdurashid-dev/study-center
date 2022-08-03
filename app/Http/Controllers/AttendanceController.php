<?php

namespace App\Http\Controllers;

use App\Http\Requests\Attendance\AttendanceStoreRequest;
use App\Http\Services\AttendanceService;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\This;

class AttendanceController extends Controller
{
    protected $service = AttendanceService::class;

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
}
