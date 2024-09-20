<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $n_latitude = $request->query("lat");
        $n_longitude = $request->query("lng");

        // Define a radius for nearby notes (in kilometers, for example)
        $radius = 10;

        $notes = Note::selectRaw(
            "*,
            (6371 * acos(cos(radians(?)) * cos(radians(n_latitude))
            * cos(radians(n_longitude) - radians(?)) + sin(radians(?))
            * sin(radians(n_latitude)))) AS distance",
            [$n_latitude, $n_longitude, $n_latitude]
        )
        ->having("distance", "<", $radius)
        ->with("user")
        ->get();

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


// http://127.0.0.1:8000/notes?lat=7.2229548&lng=3.4546532
