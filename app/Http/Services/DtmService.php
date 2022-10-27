<?php

namespace App\Http\Services;

use App\Models\Dtm;

class DtmService
{
    public function index()
    {
        return Dtm::paginate(15);
    }

}
