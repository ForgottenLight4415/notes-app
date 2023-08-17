<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'App\Http\Controllers\NoteController@index')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create', 'App\Http\Controllers\NoteController@create')->name('note.create');
    Route::post('/create', 'App\Http\Controllers\NoteController@store')->name('note.store');

    Route::get('/edit/{id}', 'App\Http\Controllers\NoteController@edit')->name('note.edit');
    Route::post('/edit/{noteObj}', 'App\Http\Controllers\NoteController@update')->name('note.update');

    Route::get('/delete/{note}', 'App\Http\Controllers\NoteController@destroy')->name('note.delete');
});

require __DIR__ . '/auth.php';
