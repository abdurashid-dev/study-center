<?php

namespace App\Http\Services;

use App\Models\Dtm;
use App\Models\Group;
use App\Models\StudentDtm;
use Illuminate\Support\Str;

class DtmService
{
    public function index()
    {
//        dd(Dtm::with('group')->get());
//        return;
    }

    public function show($slug)
    {
        $dtm = Dtm::with('group')->where('slug', $slug)->first();
        $students = StudentDtm::with('student')->where('dtm_id', $dtm->id)->orderByDesc('count_answers')->paginate(15);
        return [$dtm, $students];
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

    public function studentDtmCreate($slug)
    {
        $dtm = Dtm::where('slug', $slug)->first();
        $students = StudentDtm::with('students')->where('dtm_id', $dtm->id)->first();
        return [$dtm, $students];
    }

    public function studentDtmStore(array $data, $dtm, $group)
    {
        $dtm = $this->getItem($dtm);
        $data['dtm_id'] = $dtm->id;
        $data['group_id'] = $group;
        StudentDtm::create($data);
    }
}
