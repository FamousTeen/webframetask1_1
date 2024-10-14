<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events in Surabaya</title>
  @vite('resources/css/app.css')

  @yield('librarycss')
</head>

<body>
  <nav class="bg-white shadow-md">
    <div class="px-6 flex h-16">
      <!-- <div class="flex justify-between h-16"> -->
      <div class="flex items-center">
        <!-- Logo -->
        <a href="#" class="text-2xl font-bold text-gray-800">Event.GG</a>
      </div>

      @if (Route::is('events.index'))
      <ul class="flex space-x-4 mx-auto  transform translate-y-5  relative">
        <!-- Master Data Menu -->
        <li class="group relative"> <!-- Add relative positioning -->
          <a href="#" class="text-gray-800 font-semibold">Master Data</a>
          <!-- Dropdown Menu -->
          <ul
            class="dropdown-list absolute hidden group-hover:block bg-white shadow-lg mt-1 space-y-2 p-2 border border-gray-200">
            
            <li><a href="{{ route('categories.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Event Category</a></li>
            
            <li><a href="{{ route('organizers.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Organizer</a></li>

            <li><a href="{{ route('event_table') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Event</a></li>
          </ul>
        </li>

        <!-- Other Menu Items -->
        <li><a href="{{ route('events.index') }}" class="text-gray-800 font-bold">Events</a></li>
      </ul>

      @else
      <ul class="flex space-x-4 mx-auto  transform translate-y-5  relative">
        <!-- Master Data Menu -->
        <li class="group relative"> <!-- Add relative positioning -->
          <a href="#" class="text-gray-800 font-bold">Master Data</a>
          <!-- Dropdown Menu -->
          <ul
            class="dropdown-list absolute hidden group-hover:block bg-white shadow-lg mt-1 space-y-2 p-2 border border-gray-200">
            <li><a href="{{ route('categories.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Event Category</a></li>
            <li><a href="{{ route('organizers.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Organizer</a></li>
            <li><a href="{{ route('event_table') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Master Event</a></li>
          </ul>
        </li>

        <!-- Other Menu Items -->
        <li><a href="{{ route('events.index') }}" class="text-gray-800 font-semibold">Events</a></li>
      </ul>

      @endif
    </div>
  </nav>

  @yield('content')

  <div class="container">
    @if(isset($events)) {{-- Ensure events is set and not empty --}}
    <h1 class="font-bold ms-16 mt-5 text-xl">Events in Surabaya</h1>
    <div class="grid grid-cols-3">
      @foreach ($events as $event)
      <a href="{{ route('events.show', ['id' => $event->event_id, 'event' => $event]) }}">
      <div class="card max-w-sm mx-auto my-5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
      <img class="w-full h-48 object-cover"
      src="https://media.istockphoto.com/id/1412045138/id/foto/pasar-malam-phuket-walking-street-di-phuket.jpg?s=2048x2048&w=is&k=20&c=Zwgcq0C1ocwZ1wrhbhdNNCNTY_oNVMkAEd2KfVwbK3U=">
      <div class="p-6">
      <h2 class="text-2xl font-semibold text-gray-800">{{ $event->title }}</h2>
      <p class="mt-4 text-gray-600">{{ $event->venue }}</p>
      <p class="mt-4 text-gray-600 font-semibold">{{ date("D, M j Y", strtotime($event->date)) }} -
        {{$event->start_time}} AM
      </p>
      <br>
      <p class="mt-4 text-gray-600">Free</p>
      <p class="mt-4 text-gray-600">Organizer: {{$event->organizer->name}}</p>
      </div>
      </div>
      </a>
    @endforeach
    </div>
  @endif
  </div>

  @vite('resources/js/app.js')

  @yield('libraryjs')
</body>

</html>