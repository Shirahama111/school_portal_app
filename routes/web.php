<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainmenuController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\EmergencyContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// localhostにアクセスでloginページを表示
Route::get('/', function () {
    return view('auth.login');
});


Route::get('/main-menu', function () {
    return view('main-menu');
})->middleware(['auth', 'verified'])->name('main-menu');

Route::middleware('auth')->group(function () {


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'editStudent'])->name('profile.edit.student');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/consultation', [ConsultationController::class, 'index'])->name('consultation.index');
    Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::post('/course', [CourseController::class, 'store'])->name('course.store');

    Route::get('/get_events', [ScheduleController::class, 'getEvents']);
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::delete('/schedule', [ScheduleController::class, 'delete'])->name('schedule.delete');

    Route::get('/file-share', [FileController::class, 'index'])->name('file-share.index');
    Route::post('/file-share', [FileController::class, 'store'])->name('file-share.store');
    Route::delete('/file-share', [FileController::class, 'delete'])->name('file-share.delete');


    Route::get('/download/{file_path}', [FileController::class, 'download'])->name('file-share.download');

    Route::post('/file-share/make-directory', [FileController::class, 'makeDirectory'])->name('file-share.make-directory');
    Route::post('/file-share/delete-directory', [FileController::class, 'deleteDirectory'])->name('file-share.delete-directory');

    Route::get('/emergency-contact', [EmergencyContactController::class, 'index'])->name('emergency-contact.index');
    Route::post('/emergency-contact', [EmergencyContactController::class, 'store'])->name('emergency-contact.store');
    Route::delete('/emergency-contact', [EmergencyContactController::class, 'delete'])->name('emergency-contact.delete');


    //routeはpathを入れるとおかしくなる

});

require __DIR__.'/auth.php';
