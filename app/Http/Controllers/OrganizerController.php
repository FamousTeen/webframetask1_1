<?php

namespace App\Http\Controllers;
use App\Models\Organizers;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizers = Organizers::all(); // Fetch all events
        return view('organizer.index', compact('organizers')); // Return the view with events
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view(view: 'organizer.create'); // Return the view for creating a new organizer
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
            'active' => 'boolean',
        ]);
    
        Organizers::create($validated);
    
        return redirect()->route('organizer.index')->with('success', 'Organizer created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
   /**
 * Display the specified resource.
 */
public function show(string $id)
{
    $organizer = Organizers::findOrFail($id); // Fetch the organizer by ID
    return view('organizer.show', compact('organizer')); // Return the view with the organizer data
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $organizer = Organizers::findOrFail($id); // Fetch the organizer by ID
    return view('organizer.edit', compact('organizer')); // Return the view with the organizer data
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'facebook_link' => 'nullable|url',
        'x_link' => 'nullable|url',
        'website_link' => 'nullable|url',
        'active' => 'boolean',
    ]);

    // Find the organizer by ID
    $organizer = Organizers::findOrFail($id);

    // Update the organizer with the validated data
    $organizer->update($validated);

    // Redirect back to the organizers list with a success message
    return redirect()->route('organizer.index')->with('success', 'Organizer updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organizer = Organizers::findOrFail($id);
        
        // Delete the organizer and its related events
        
        $organizer->delete();
    
        // Redirect back to show.blade.php with a message
        return redirect()->route('organizer.index')->with('success', 'Organizer deleted successfully.');
    }
    
}
