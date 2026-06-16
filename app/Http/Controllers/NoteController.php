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
        // Get ALL notes from the database, newest first
        $notes = Note::latest()->get();
 
        // Pass $notes to the view
        return view('notes.index', compact('notes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Just return the view — no data needed
        return view('notes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Step 1: Validate the input
        $validated = $request->validate([
        'title'   => 'required|min:3|max:255',
        'subject' => 'required|max:100',
        'body'    => 'required|min:10',
        ]);
        // If validation fails, Laravel automatically redirects back
        // and shows the error messages above the form.
 
        // Step 2: Save to database
        Note::create($validated);
 
        // Step 3: Redirect to the list with a success message
        return redirect()->route('notes.index')
                     ->with('success', 'Note created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(note $note)
    {
        // Laravel automatically finds the note by ID — this is Implicit Binding
        return view('notes.show', compact('note'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        // Implicit binding fetches the note automatically
        return view('notes.edit', compact('note'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
{
    // Validate — same rules as store()
    $validated = $request->validate([
        'title'   => 'required|min:3|max:255',
        'subject' => 'required|max:100',
        'body'    => 'required|min:10',
    ]);
 
    // Update the note with new data
    $note->update($validated);
 
    // Redirect back to the note's detail page
    return redirect()->route('notes.show', $note)
                     ->with('success', 'Note updated!');
}




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
{
    // Delete the note from the database
    $note->delete();
 
    // Redirect back to the list
    return redirect()->route('notes.index')
                     ->with('success', 'Note deleted.');
}


}
