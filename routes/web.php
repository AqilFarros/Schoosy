<?php

use App\Http\Controllers\AbsentClassController;
use App\Http\Controllers\AbsentEmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PrevillageController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/landing-page', function () {
    return view('page.landing-page');
})->name('landing-page');

Route::middleware('auth')->group(function () {
    Route::resource('/user', UserController::class);
});

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::post('/approve/{id}', [AdminController::class, 'statusSchool'])->name('statusSchool');
    Route::get('/school', [AdminController::class, 'school'])->name('school');
    Route::get('/book', [AdminController::class, 'book'])->name('book');
    Route::get('/video', [AdminController::class, 'video'])->name('video');
    Route::get('/user', [AdminController::class, 'user'])->name('user');
    Route::delete('/delete-school/{id}', [AdminController::class, 'deleteSchool'])->name('school.delete');
    Route::delete('/delete-book/{id}', [AdminController::class, 'deleteBook'])->name('book.delete');
    Route::delete('/delete-video/{id}', [AdminController::class, 'deleteVideo'])->name('video.delete');
    Route::delete('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('user.delete');
});

Route::prefix('school')->name('school.')->middleware('auth')->group(function () {
    Route::get('/search', [PrevillageController::class, 'searchSchool'])->middleware('auth')->name('searchSchool');
    // Route::get('/{code}', [PrevillageController::class, 'previewSchool'])->middleware('auth')->name('previewSchool');
    Route::post('/{code}', [PrevillageController::class, 'joinSchool'])->middleware('auth')->name('joinSchool');
    Route::delete('/{code}', [PrevillageController::class, 'leaveSchool'])->middleware('auth')->name('leaveSchool');
    Route::resource('/', SchoolController::class)->middleware('auth')->only(['store', 'create']);
    Route::get('/{slug}', [SchoolController::class, 'show'])->middleware('previllage')->name('show');
    Route::get('/edit/{slug}', [SchoolController::class, 'edit'])->middleware('operator')->name('edit');
    Route::put('/{slug}', [SchoolController::class, 'update'])->middleware('operator')->name('update');
    Route::delete('/{slug}', [SchoolController::class, 'destroy'])->middleware('owner')->name('destroy');
    Route::get('/member/{slug}', [PrevillageController::class, 'getPrevillage'])->middleware('previllage')->name('member');
    Route::get('/', [SchoolController::class, 'index'])->middleware('admin')->name('index');
});

Route::prefix('{slug}')->name('previlage.')->group(function () {
    Route::get('/search', [PrevillageController::class, 'searchPrevillage'])->middleware('previllage')->name('searchPrevillage');
    Route::put('/update/{prvId}', [PrevillageController::class, 'updatePrevillage'])->middleware('operator')->name('updatePrevillage');
    Route::delete('/delete/{prvId}', [PrevillageController::class, 'deletePrevillage'])->middleware('operator')->name('deletePrevillage');

    Route::get('/book', [BookController::class, 'index'])->middleware('previllage')->name('book.index');
    Route::get('/book/create', [BookController::class, 'create'])->middleware('operator')->name('book.create');
    Route::get('/book/{bookSlug}', [BookController::class, 'show'])->middleware('previllage')->name('book.show');
    Route::post('/book/store', [BookController::class, 'store'])->middleware('operator')->name('book.store');
    Route::get('/book/{bookSlug}/edit', [BookController::class, 'edit'])->middleware('operator')->name('book.edit');
    Route::put('/book/{bookSlug}/update', [BookController::class, 'update'])->middleware('operator')->name('book.update');
    Route::delete('/book/{bookSlug}', [BookController::class, 'destroy'])->middleware('operator')->name('book.destroy');
    Route::post('book/{bookSlug}/video', [BookController::class, 'addVideo'])->middleware('operator')->name('book.addVideo');
    Route::delete('/book/{bookSlug}/video/{id}', [BookController::class, 'deleteVideo'])->middleware('operator')->name('book.deleteVideo');

    Route::get('/absent-employee', [AbsentEmployeeController::class, 'index'])->middleware('operator')->name('absentEmployee.index');
    Route::post('/absent-employee/make-absent', [AbsentEmployeeController::class, 'makeAbsent'])->middleware('operator')->name('absentEmployee.makeAbsent');

    Route::get('/classroom', [ClassroomController::class, 'index'])->middleware('previllage')->name('classroom.index');
    Route::get('/{slugClassroom}', [ClassroomController::class, 'show'])->middleware('previllage')->name('classroom.show');
    Route::get('/classroom/create', [ClassroomController::class, 'create'])->middleware('operator')->name('classroom.create');
    Route::post('/classroom/store', [ClassroomController::class, 'store'])->middleware('operator')->name('classroom.store');
    Route::get('/{slugClassroom}/edit', [ClassroomController::class, 'edit'])->middleware('operator')->name('classroom.edit');
    Route::put('/{slugClassroom}/update', [ClassroomController::class, 'update'])->middleware('operator')->name('classroom.update');
    Route::delete('/{slugClassroom}/destroy', [ClassroomController::class, 'destroy'])->middleware('operator')->name('classroom.destroy');
    Route::get('/{slugClassroom}/edit-member', [ClassroomController::class, 'editMember'])->middleware('operator')->name('classroom.editMember');
    Route::put('/{slugClassroom}/add-member', [ClassroomController::class, 'addMember'])->middleware('operator')->name('classroom.addMember');
    Route::put('/{slugClassroom}/delete-member', [ClassroomController::class, 'deleteMember'])->middleware('operator')->name('classroom.deleteMember');
    Route::put('/{slugClassroom}/add-homeroom', [ClassroomController::class, 'addHomeroom'])->middleware('operator')->name('classroom.addHomeroom');
    Route::put('/{slugClassroom}/remove-homeroom', [ClassroomController::class, 'removeHomeroom'])->middleware('operator')->name('classroom.removeHomeroom');
    Route::get('/{slugClassroom}/absent/{id}', [AbsentClassController::class, 'show'])->middleware('homeroom')->name('classroom.absent');
    Route::get('/{slugClassroom}/detail-absent/{id}', [AbsentClassController::class, 'detailAbsent'])->middleware('homeroom')->name('classroom.detailAbsent');
    Route::post('/{slugClassroom}/make-absent', [AbsentClassController::class, 'store'])->middleware('homeroom')->name('classroom.makeAbsent');
    Route::post('/{slugClassroom}/update-absent/{id}', [AbsentClassController::class, 'updateStatus'])->middleware('homeroom')->name('classroom.updateAbsent');
});
