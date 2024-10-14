<?php
use Illuminate\Support\Facades\DB;
?>

@extends('index')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events in Surabaya</title>
  @vite('resources/css/app.css')
</head>

@section('content')
<div class="max-w-3xl mx-auto mt-5">
  <h1 class="text-2xl font-semibold mb-4">Organizers</h1>

  <form id="eventForm" action="{{ route('organizers.update', ['organizer' => $selectedOrganizer->organizer_id]) }}"
    method="POST">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-2 auto-rows-auto gap-6">
      <!-- Organizer Name -->
      <div class="col-span-1">
        <label for="organizer-name" class="block text-sm font-medium text-gray-700">Organizer Name</label>
        <input type="text" id="organizer-name" name="organizer_name"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter event name"
          value="{{ $selectedOrganizer->name }}">
      </div>
      <br>

      <!-- Links -->
      <div class="col-span-1">
        <label for="facebook_link" class="block text-sm font-medium text-gray-700">Facebook</label>
        <input type="text" id="facebook_link" name="facebook_link" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Enter location" value="{{ $selectedOrganizer->facebook_link }}">
      </div>

      <div class="col-span-1">
        <label for="x_link" class="block text-sm font-medium text-gray-700">X</label>
        <input type="text" id="x_link" name="x_link" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Enter location" value="{{ $selectedOrganizer->x_link }}">
      </div>

      <div class="col-span-1">
        <label for="website_link" class="block text-sm font-medium text-gray-700">Website</label>
        <input type="text" id="website_link" name="website_link" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Enter location" value="{{ $selectedOrganizer->website_link }}">
      </div>

      <!-- About -->
      <div class="md:col-span-2">
        <label for="about" class="block text-sm font-medium text-gray-700">About</label>
        <textarea id="about" name="about" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Event description"
          value="{{ $selectedOrganizer->description }}">{{ $selectedOrganizer->description }}</textarea>
      </div>

      <!-- Buttons -->
      <div class="md:col-span-2 flex justify-end space-x-3">
        <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md submit">Save</button>
        <a href="{{ route('organizers.index') }}" type="button"
          class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancel</a>
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>

@endsection

@section('library-js')

@endsection