<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
// routes/web.php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\Event_categoriesController;
use App\Http\Controllers\MasterEventController;



Route::get('/events', [EventController::class, 'index']);

Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::resource('organizer', OrganizerController::class);

Route::resource('event_categories', Event_categoriesController::class);

Route::resource('masterEvents', MasterEventController ::class);







