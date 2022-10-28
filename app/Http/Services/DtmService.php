<?php

namespace App\Http\Services;

use App\Models\Dtm;
use App\Models\Group;
use Illuminate\Support\Str;

class DtmService
{
    public function index()
    {
        return Dtm::paginate(15);
    }

    public function show($id)
    {
        return Dtm::findOrFail($id);
    }

    public function create()
    {
        $dtm = new Dtm();
        $groups = Group::where('status', 1)->get();
        return [$dtm, $groups];
    }

    public function store(array $data)
    {
        $data['slug'] = Str::slug($data['name']);
        Dtm::create($data);
    }
}
