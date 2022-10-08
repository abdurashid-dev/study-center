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

    public function edit($slug)
    {
        $group = Group::where('slug', $slug)->first();
        $group_times_count = GroupTime::where('group_id', $group->id)->count();
        if ($group_times_count == 0) {
            GroupTime::create([
                'group_id' => $group->id
            ]);
        }
        $group_time = GroupTime::where('group_id', $group->id)->first();
        return $group_time;
    }

    public function update(array $data, $id)
    {
        $group_times = GroupTime::where('group_id', $id)->get();
        foreach ($group_times as $group_time) {
            $group_time->delete();
        }
        $count = count($data['times']);
        for ($c = 0; $c < $count; $c++) {
            GroupTime::create([
                'group_id' => $id,
                'time' => $data['times'][$c],
                'day' => $data['days'][$c]
            ]);
        }
    }
}
