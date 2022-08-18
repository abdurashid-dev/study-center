<?php

namespace App\Http\Services;

use App\Models\Group;
use App\Models\StudentGroup;
use Illuminate\Support\Str;

class GroupService
{
    public function store(array $data, $request): void
    {
        $group = new Group;
        $group->name = $data['name'];
        $group->price = $data['price'];
        $group->slug = Str::slug($data['name']) . '-' . Str::random(5);
        $group->description = $data['description'];
        $group->save();
        //slug in database is unique, so we need to check if it already exists
        if (Group::where('slug', $group->slug)->exists()) {
            $group->slug = Str::slug($data['name']) . '-' . Str::random(5);
            $group->save();
        }
    }

    public function destroy(Group $group): void
    {
        $students = StudentGroup::where('group_id', $group->id)->get();
        foreach ($students as $student) {
            $student->delete();
        }
        $group->delete();
    }

    public function update(array $data, Group $group): void
    {
        $group->name = $data['name'];
        $group->description = $data['description'];
        $group->price = $data['price'];
        $group->save();
    }

    public function show($slug)
    {
        dd($slug);
        return Group::where('slug', $slug)->first();
    }
}
