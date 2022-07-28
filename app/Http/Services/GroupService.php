<?php

namespace App\Http\Services;

use App\Models\Group;
use Illuminate\Support\Str;

class GroupService
{
    public function store(array $data, $request): void
    {
        $group = new Group;
        $group->name = $data['name'];
        $group->slug = Str::slug($data['name']) . '-' . Str::random(5);
        $group->description = $data['description'];
        $group->save();
    }
}
