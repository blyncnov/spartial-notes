<?php

use Illuminate\Http\Request;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;
use App\Models\Note;

// HOME ROUTE
Route::get('/', function () {
    return view('home');
})->name("home");

// MARK: NOTE RESOURCE
Route::resource('notes', NoteController::class);

// MARK: UNLOCK PRIVATE NOTE
Route::post('/notes/{note_id}/unlock', function (Request $request, string $note_id) {

    $note = Note::findOrFail($note_id);
    $note_password = $request->validate([
        "n_passkey" => "required",
    ]);


    if($note_password["n_passkey"] !== $note->n_passkey){
        return redirect()->route("notes.index");
    }

    return redirect()->route("notes.show", $note->id);

})->name("notes.unlock");

// MARK: NOT FOUND PAGE ROUTE
Route::fallback(function () {
    return dd("Page Not Found");
})->name(name: "notfound");
