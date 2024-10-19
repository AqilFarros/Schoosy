<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/landing-page', function () {
    return view('page.landing-page');
})->name('landing-page');

Route::middleware('auth')->group(function () {
    Route::resource('/user', UserController::class);
});

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/index', [AdminController::class, 'index'])->name('index');
    Route::post('/approve/{id}', [AdminController::class, 'statusSchool'])->name('statusSchool');
});

Route::prefix('school')->name('school.')->group(function() {
    Route::resource('/', SchoolController::class)->middleware('auth')->only(['store', 'create']);
    Route::get('/{id}', [SchoolController::class, 'show'])->middleware('previllage')->name('show');
    Route::get('/edit/{id}', [SchoolController::class, 'edit'])->middleware('operator')->name('edit');
    Route::put('/{id}', [SchoolController::class, 'update'])->middleware('operator')->name('update');
    Route::delete('/{id}', [SchoolController::class, 'destroy'])->middleware('owner')->name('destroy');
    Route::get('/', [SchoolController::class, 'index'])->middleware('admin')->name('index');
});
