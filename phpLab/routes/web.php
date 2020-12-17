<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [App\Http\Controllers\NotesController::class, 'notes'])->name('notes');
Route::post('/comment', [App\Http\Controllers\NoteController::class, 'addComment'])->name('comment');
Route::get('/notes/{id}', [App\Http\Controllers\NoteController::class, 'note'])->name('note');
Route::get('/delete/{id}', [App\Http\Controllers\NotesController::class, 'delete'])->name('delete');
Route::get('/search}', [App\Http\Controllers\NotesController::class, 'search'])->name('search');

Route::get('/add', function () {
    return view('add');
})->name('add')->middleware('auth');
Route::post('/add', [App\Http\Controllers\AddNoteController::class, 'add']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
