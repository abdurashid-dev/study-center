<?php

namespace App\Http\Services;

use App\Models\Group;
use App\Models\GroupTime;

class GroupTimeService
{
    public function index()
    {
        return Group::paginate(20);
    }
}
