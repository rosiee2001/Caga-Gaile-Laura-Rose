<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ListStudentsController;
use Livewire\Livewire;
use Illuminate\Auth\AuthenticatedSessionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('layouts.dashboard');




Route::middleware(['web'])->group(function () {
    Route::get('/liststudents', [\App\Http\Controllers\ListStudentsController::class, 'index'])->name('liststudents.index');
});




Auth::routes();

Route::get('/layouts/add', [App\Http\Controllers\ListStudentsController::class, 'showStudentInfo'])->name('layouts.add');
Route::get('/liststudents/{id}/edit', [ListStudentsController::class, 'edit'])->name('liststudents.edit');
Route::put('/liststudents/{id}', [ListStudentsController::class, 'update'])->name('liststudents.update');
Route::delete('/liststudents/{id}', [ListStudentsController::class,'destroy'])->name('liststudents.destroy');
Route::post('/liststudents', [ListStudentsController::class, 'store']);
Route::get('/liststudents/create', [ListStudentsController::class, 'create'])->name('liststudents.create');
Route::post('/liststudents', [ListStudentsController::class, 'store'])->name('liststudents.store');
Route::post('/liststudents/{id}/add-schedule', [ListStudentsController::class, 'addSchedule'])->name('addSchedule');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


