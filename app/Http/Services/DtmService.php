<?php

namespace App\Http\Services;

use App\Models\Dtm;
use App\Models\Group;
use Illuminate\Support\Str;

class DtmService
{
    public function index()
    {
//        dd(Dtm::with('group')->get());
//        return;
    }

    public function show($id)
    {
        return Dtm::findOrFail($id);
    }

    public function create()
    {
        $dtm = new Dtm();
        $groups = Group::all();
        return [$dtm, $groups];
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        Dtm::create($data);
    }

    public function edit($dtm)
    {
        $dtm = Dtm::where('slug', $dtm)->first();
        $groups = Group::all();
        return [$dtm, $groups];
    }
}
