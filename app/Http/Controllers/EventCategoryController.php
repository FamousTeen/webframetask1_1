<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event_Categories;
use Illuminate\Support\Facades\DB;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesData = Event_Categories::query()->where('active', 1)->get();
        return view('master_control/crud_category_table', [
            'categories' => $categoriesData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master_control/create_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255'
        ]);

        DB::table('event_categories')->insert([
            'name' => $request->category_name,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('categories.index')->with('success', 'Event updated successfully.');
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
        $categoryData = Event_Categories::query()->where('category_id', (int)$id)->first();
        return view('master_control/edit_category', [
            'selectedCategory' => $categoryData
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|max:255'
        ]);
    
        // Find the event and update it
        $masterEvent = Event_Categories::findOrFail((int)$id);
    
        // Update the main event
        $masterEvent->update([
            'name' => $request->category_name,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // Redirect with success message
        return redirect()->route('categories.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('event_categories')
        ->where('category_id', (int)$id) // Specify the condition
        ->update([
            'active' => 0
        ]);

        return redirect()->route('categories.index')->with('success', 'Event updated successfully.');
    }
}
