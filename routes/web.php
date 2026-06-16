<?php
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('notes', NoteController::class);
Route::get('/notes/{search}', [NoteController::class, 'search']);