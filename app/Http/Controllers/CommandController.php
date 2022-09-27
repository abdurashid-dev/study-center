<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CommandController extends Controller
{
    public function index()
    {
        return view('admin.commands');
    }

    public function command(Request $request)
    {
        Artisan::call($request->command);
        return 'done mr:)';
    }
}
