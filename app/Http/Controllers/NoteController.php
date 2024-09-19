<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // All Notes
        $notes = Note::with("user")->get();

        return view("notes.index", [
            "notes" => $notes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("notes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $note_fields = $request->validate([
            "n_title" => "required|max:225",
            "n_content" => "required|max:225",
            "n_passkey" => "sometimes",
            "n_description" => "required|max:225",
            "n_latitude" => "required",
            "n_longitude" => "required",
            "n_visibility" => "required",
        ]);

        Note::create([...$note_fields, "user_id" => 1]);

        return redirect()->route(("notes.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view("notes.show", ["note" => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        return view("notes.edit", ["note" => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $note_fields = $request->validate([
            "n_title" => "required|max:225",
            "n_content" => "required|max:225",
            "n_passkey" => "sometimes",
            "n_description" => "required|max:225",
            "n_latitude" => "required",
            "n_longitude" => "required",
            "n_visibility" => "required",
        ]);

        $note->update($note_fields);

        return redirect()->route("notes.show", $note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route("notes.index", $note);
    }
}
