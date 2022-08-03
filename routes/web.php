<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a groups which
| contains the "web" middleware groups. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resources([
        'groups' => GroupController::class,
        'students' => StudentController::class,
    ]);
    Route::get('attendance/{group}', [AttendanceController::class, 'create'])->name('attendance.create');
    Route::post('attendance/{group}', [AttendanceController::class, 'store'])->name('attendance.store');
});
