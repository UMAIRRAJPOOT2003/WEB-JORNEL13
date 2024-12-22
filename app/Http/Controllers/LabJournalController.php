<?php

namespace App\Http\Controllers;

use App\Models\LabJournal;  // Make sure to import your model
use Illuminate\Http\Request;

class LabJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = LabJournal::all(); // Fetch all lab journal entries
        return view('lab_journal.index', compact('journals')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lab_journal.create');  // Return the create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        // Create a new lab journal entry
        LabJournal::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        // Redirect to the lab journal index page
        return redirect()->route('lab-journal.index')
                         ->with('success', 'Lab Journal entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the lab journal by ID
        $labJournal = LabJournal::findOrFail($id);
        return view('lab_journal.show', compact('labJournal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the lab journal by ID
        $labJournal = LabJournal::findOrFail($id);
        return view('lab_journal.edit', compact('labJournal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        // Find the lab journal and update it
        $labJournal = LabJournal::findOrFail($id);
        $labJournal->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        // Redirect to the lab journal index page
        return redirect()->route('lab-journal.index')
                         ->with('success', 'Lab Journal entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the lab journal and delete it
        $labJournal = LabJournal::findOrFail($id);
        $labJournal->delete();

        // Redirect to the lab journal index page
        return redirect()->route('lab-journal.index')
                         ->with('success', 'Lab Journal entry deleted successfully.');
    }
}
