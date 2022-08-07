<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
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
    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('index');
        Route::get('/show/{group}', [AttendanceController::class, 'show'])->name('show');
        Route::get('/{group}', [AttendanceController::class, 'create'])->name('create');
        Route::post('/{group}', [AttendanceController::class, 'store'])->name('store');
        Route::get('/edit/{group}', [AttendanceController::class, 'edit'])->name('edit');
        Route::put('/{group}', [AttendanceController::class, 'update'])->name('update');
    });

    Route::controller(StudentPaymentController::class)->prefix('payment')->name('payment.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
    });
});
