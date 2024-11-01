<?php

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
});

Route::prefix('school')->name('school.')->group(function () {
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

    Route::get('/classroom', [ClassroomController::class, 'index'])->middleware('previllage')->name('classroom.index');
    Route::get('/{slugClassroom}', [ClassroomController::class, 'show'])->middleware('previllage')->name('classroom.show');
    Route::get('/classroom/create', [ClassroomController::class, 'create'])->middleware('operator')->name('classroom.create');
    Route::post('/classroom/store', [ClassroomController::class, 'store'])->middleware('operator')->name('classroom.store');
    Route::get('/{slugClassroom}/edit', [ClassroomController::class, 'edit'])->middleware('operator')->name('classroom.edit');
    Route::put('/{slugClassroom}/update', [ClassroomController::class, 'update'])->middleware('operator')->name('classroom.update');
    Route::delete('/{slugClassroom}/destroy', [ClassroomController::class, 'destroy'])->middleware('operator')->name('classroom.destroy');
});
