<?php

use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\OrganizerController;
use App\Models\Tags;
use App\Models\Events;
use App\Models\Organizers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('index');
});

Route::resource('events', EventController::class)->names([
    'index' => 'events.index',
    'create' => 'events.create',
    'store' => 'events.store',
    'show' => 'events.show',
    'edit' => 'events.edit',
    'update' => 'events.update',
    'destroy' => 'events.destroy',
]);

Route::resource('organizers', OrganizerController::class)->names([
    'index' => 'organizers.index',
    'create' => 'organizers.create',
    'store' => 'organizers.store',
    'show' => 'organizers.show',
    'edit' => 'organizers.edit',
    'update' => 'organizers.update',
    'destroy' => 'organizers.destroy',
]);

Route::resource('categories', EventCategoryController::class)->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'show' => 'categories.show',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy',
]);

Route::get('/eventTable', function () {
    $eventsData = Events::with('organizer')->where('active', 1)->get();
    return view('master_control/crud_event_table', data: [
        'allEvent' => $eventsData
    ]);
})->name('event_table');

Route::get('/editEvent/{id}', function ($id) {
    $eventData = Events::with('organizer')->where('event_id', $id)->first();
    $organizerData = Organizers::query()->where('active', 1)->get();
    $tagsData = Tags::query()->where('event_id', $id)->get();
    return view('master_control/edit_event', data: [
        'selectedEvent' => $eventData,
        'organizers' => $organizerData,
        'tags' => $tagsData
    ]);
})->name('editEvent');

Route::get('/createEvent', function () {
    $organizerData = Organizers::query()->where('active', 1)->get();
    return view('master_control/create_event', data: [
        'organizers' => $organizerData
    ]);
})->name('createEvent');