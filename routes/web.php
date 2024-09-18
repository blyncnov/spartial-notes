<?php


use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

// HOME ROUTE
Route::get('/', function () {
    return view('home');
})->name("home");


// NOTE RESOURCE
Route::resource('notes', NoteController::class);

// NOT FOUND PAGE ROUTE
Route::fallback(function () {
    return dd("Page Not Found");
})->name(name: "notfound");
