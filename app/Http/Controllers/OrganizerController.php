<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Organizers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizersData = Organizers::query()->where('active', 1)->get();
        return view('master_control/crud_organizer_table', [
            'organizers' => $organizersData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master_control/create_organizer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organizer_name' => 'required|max:255',
            'facebook_link' => 'required|max:255',
            'x_link' => 'required|max:255',
            'website_link' => 'required|max:255',
            'about' => 'required|max:255'
        ]);

        DB::table('organizers')->insert([
            'name' => $request->organizer_name,
            'facebook_link' => $request->facebook_link,
            'description' => $request->about,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('organizers.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $organizerData = Organizers::query()->where('organizer_id', $id)->first();
        return view('Organizer/detail2', [
            'organizer' => $organizerData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organizersData = Organizers::query()->where('organizer_id', (int)$id)->first();
        return view('master_control/edit_organizer', [
            'selectedOrganizer' => $organizersData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'organizer_name' => 'required|max:255',
            'facebook_link' => 'required|max:255',
            'x_link' => 'required|max:255',
            'website_link' => 'required|max:255',
            'about' => 'required|max:255'
        ]);
    
        // Find the event and update it
        $masterEvent = Organizers::findOrFail((int)$id);
    
        // Update the main event
        $masterEvent->update([
            'name' => $request->organizer_name,
            'facebook_link' => $request->facebook_link,
            'description' => $request->about,
            'x_link' => $request->x_link,
            'website_link' => $request->website_link,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Redirect with success message
        return redirect()->route('organizers.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('organizers')
        ->where('organizer_id', (int)$id) // Specify the condition
        ->update([
            'active' => 0
        ]);

        return redirect()->route('organizers.index')->with('success', 'Event updated successfully.');
    }
}
