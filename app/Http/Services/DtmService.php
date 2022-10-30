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

    public function show($dtm)
    {
        return Dtm::with('group')->where('slug', $dtm)->first();
    }

    public function getItem($slug)
    {
        return Dtm::where('slug', $slug)->first();
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

    public function edit($slug)
    {
        $dtm = $this->getItem($slug);
        $groups = Group::all();
        return [$dtm, $groups];
    }

    public function update(array $data, $id)
    {
        $dtm = $this->getItem($id);
        $dtm->update($data);
    }
}
