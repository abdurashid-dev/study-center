<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboradController;
use App\Http\Controllers\DtmController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupTimeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentPaymentController;
use App\Http\Livewire\Payment\StudentPayment;
use App\Http\Livewire\Student\StudentComponent;
use App\Http\Livewire\Student\StudentsArchive;
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
Route::get('/register', function () {
    return redirect(404);
});
Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::get('/calendar', [FrontendController::class, 'calendarIndex'])->name('calendar.index');
Route::get('/calendar/{slug}', [FrontendController::class, 'calendarShow'])->name('calendar.show');
Route::get('/dtm/front', [FrontendController::class, 'dtm'])->name('frontend.dtm');
Route::get('/dtm/front/show/{dtm}', [FrontendController::class, 'dtmListShow'])->name('frontend.dtm-list-show');
Route::get('/info', [FrontendController::class, 'info'])->name('info');
Route::get('/result/{student}', [FrontendController::class, 'result'])->name('search.result');
Route::get('/result/{student}/attendances', [FrontendController::class, 'attendance'])->name('result.attendance');
Route::get('/result/{student}/dtm', [FrontendController::class, 'dtmShow'])->name('result.dtm');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboradController::class, 'index'])->name('dashboard');

    Route::resource('groups', GroupController::class);
    Route::resource('groups-times', GroupTimeController::class);
    Route::resource('students', StudentController::class)->except('index');
    Route::resource('/dtm', DtmController::class);

// DTM results
    Route::get('/dtm/student/{slug}', [DtmController::class, 'studentDtmCreate'])->name('dtm.student-dtm-create');
    Route::post('/dtm/student/{dtm}/{group?}', [DtmController::class, 'studentDtmStore'])->name('dtm.student-dtm-store');
    Route::get('/dtm/student/edit/{student}/{slug}', [DtmController::class, 'studentDtmEdit'])->name('dtm.student-dtm-edit');
    Route::put('/dtm/student/update/{dtm}/{student}', [DtmController::class, 'studentDtmUpdate'])->name('dtm.student-dtm-update');

    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', StudentComponent::class)->name('index');
        Route::post('/student/{student}/restore', [StudentController::class, 'restore'])->name('restore');
        Route::delete('/student/{student}', [StudentController::class, 'delete'])->name('delete');
    });

    Route::prefix('attendance')->name('attendance.')->group(function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('index');
        Route::get('/show/{group}', [AttendanceController::class, 'show'])->name('show');
        Route::get('/{group}', [AttendanceController::class, 'create'])->name('create');
        Route::post('/{group}', [AttendanceController::class, 'store'])->name('store');
        Route::get('/edit/{group}', [AttendanceController::class, 'edit'])->name('edit');
        Route::put('/{group}', [AttendanceController::class, 'update'])->name('update');
    });

    Route::controller(StudentPaymentController::class)->prefix('payment')->name('payment.')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::get('/create/{student}', 'createSingle')->name('create.single');
        Route::get('/{payment}', 'show')->name('show');
        Route::post('/', 'store')->name('store');
    });
    Route::get('/payment', StudentPayment::class)->name('payment.index');

//archive
    Route::get('/archive', StudentsArchive::class)->name('archive.index');

//artisan commands
//    Route::get('/command', [CommandController::class, 'index']);
//    Route::post('/command', [CommandController::class, 'command'])->name('admin.command');
});
