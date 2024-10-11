<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventCategories;

class Event_categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_categories = EventCategories::all(); // Fetch all events
        return view('event_categories.index', compact('event_categories')); // Return the view with events
    }

    /**s
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'event_categories.create'); // Return the view for creating a new organizer

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'boolean',
        ]);
    
        EventCategories::create($validated);
    
        return redirect()->route('event_categories.index')->with('success', 'Organizer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event_categories = EventCategories::findOrFail($id); // Fetch the organizer by ID
        return view('event_categories.show', compact('event_categories')); // Return the view with the organizer data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event_categories = EventCategories::findOrFail($id); // Fetch the organizer by ID
    return view('event_categories.edit', compact('event_categories')); // Return the view with the organizer data
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate request data
         $request->validate([
            'name' => 'required|string|max:255',
            'active' => 'boolean',
        ]);

        // Find the category and update it
        $event_categories = EventCategories::findOrFail($id);
        $event_categories->update([
            'name' => $request->name,
            'active' => $request->has('active') ? 1 : 0,  // Checkbox handling
        ]);

        // Redirect with success message
        return redirect()->route('event_categories.index')->with('success', 'Category updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event_categories = EventCategories::findOrFail($id);
        
        // Delete the organizer and its related events
        
        $event_categories->delete();
    
        // Redirect back to show.blade.php with a message
        return redirect()->route('event_categories.index')->with('success', 'Organizer deleted successfully.');
    }
}
