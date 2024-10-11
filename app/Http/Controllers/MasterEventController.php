<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Organizers;
use App\Models\EventCategories;
class MasterEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $masterEvents = Events::with('organizer')->get(); // Eager load the organizer
    return view('masterEvents.index', compact('masterEvents')); // Return the view with events
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $organizers = Organizers::all(); // Assuming you have an Organizer model
    $categories = EventCategories::all(); // Assuming you have an EventCategory model
    return view('masterEvents.create', compact('organizers', 'categories'));
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required',
            'booking_url' => 'nullable|url',
            'tags' => 'required',
            'organizer_id' => 'required|exists:organizers,id', // Make sure organizer exists
            'category_id' => 'required|exists:event_categories,id', // Make sure category exists
        ]);

        // Create and store new event
        Events::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
            'tags' => $request->tags, // Ensure this is a comma-separated string
            'organizer_id' => $request->organizer_id,
            'category_id' => $request->category_id,
            'active' => $request->has('active') ? 1 : 0, // Set active to 1 if checkbox is checked
        ]);
        // Redirect back with success message
        return redirect()->route('masterEvents.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $masterEvent = Events::findOrFail($id);
        $organizers = Organizers::all(); // Fetch all organizers
        $categories = EventCategories::all(); // Fetch all event categories

        return view('masterEvents.edit', compact('masterEvent', 'organizers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'required',
            'booking_url' => 'nullable|url',
            'tags' => 'required',
            'organizer_id' => 'required|exists:organizers,id',
            'category_id' => 'required|exists:event_categories,id',
        ]);

        // Find the event and update it
        $masterEvent = Events::findOrFail($id);
        $masterEvent->update([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url,
'tags' => $request->tags, // No need to use implode()
            'organizer_id' => $request->organizer_id,
            'category_id' => $request->category_id,
            'active' => $request->has('active') ? 1 : 0,
        ]);

        // Redirect with success message
        return redirect()->route('masterEvents.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $masterEvents = Events::findOrFail($id);
        
        // Delete the organizer and its related events
        
        $masterEvents->delete();
    
        // Redirect back to show.blade.php with a message
        return redirect()->route('masterEvents.index')->with('success', 'Organizer deleted successfully.');
    }
}
