<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventsData = Events::with('organizer')->where('active', 1)->get();
        return view('index', [
            'events' => $eventsData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('events')->insert([
            'title' => $request->event_name,
            'organizer_id' => (int)$request->organizer,
            'event_category_id' => 1,
            'venue' => $request->location,
            'date' => date('Y-m-d', strtotime($request->event_date)),
            'start_time' => date('H:i:s', strtotime($request->event_time)),
            'description' => $request->about,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('event_table')->with('success', 'Event updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $selectedEvent = Events::with('event_category')->where('event_id', (int)$id)->first();
        return view('Event/detail', [
            'event' => $selectedEvent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, $date, $loc, $time, $organizer_id, $url, $desc, $tags)
    {
        // // Step 1: Find the event by ID
        // $event = Events::find($id);

        // if (!$event) {
        //     return redirect()->back()->with('error', 'Event not found.');
        // }

        // // Step 2: Update the event attributes
        // $event->date = $date;
        // $event->venue = $loc;
        // $event->start_time = $time;
        // $event->organizer_id = $organizer_id;
        // $event->booking_url = $url;
        // $event->description = $desc;
        // $event->tags = $id;

        // // Step 3: Save the updated event to the database
        // $event->save();

        // // Optionally redirect with success message
        // return redirect()->route('event_table')->with('success', 'Event updated successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // buat debug type
        // dd(gettype($request->event_date));

        $request->validate([
            'event_name' => 'required|max:255',
            'location' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'about' => 'required',
            'booking_url' => 'nullable|string',
            'tags' => 'required',  // Ensure tags are present
            'organizer' => 'required|exists:organizers,organizer_id'
        ]);
    
        // Find the event and update it
        $masterEvent = Events::findOrFail((int)$id);
    
        // Split the tags (comma-separated string) into an array
        $tagsArray = explode(',', $request->tags);
    
        // Delete existing tags for this event, if necessary (depends on your logic)
        DB::table('tags')->where('event_id', $id)->delete();
    
        // Insert new tags
        for ($x = 0; $x < count($tagsArray); $x++) {
            DB::table('tags')->insert([
                'event_id' => (int)$id,
                'title' => $tagsArray[$x],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    
        // Update the main event
        $masterEvent->update([
            'title' => $request->event_name,
            'venue' => $request->location,
            'date' => date('Y-m-d', strtotime($request->event_date)),
            'start_time' => date('H:i:s', strtotime($request->event_time)),
            'description' => $request->about,
            'booking_url' => $request->booking_url,
            'tags' => (int)$id,
            'organizer_id' => (int)$request->organizer,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Redirect with success message
        return redirect()->route('event_table')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('events')
        ->where('event_id', (int)$id) // Specify the condition
        ->update([
            'active' => 0
        ]);

        return redirect()->route('event_table')->with('success', 'Event updated successfully.');
    }
}
