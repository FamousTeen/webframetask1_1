<?php
use Illuminate\Support\Facades\DB;
?>


@extends('index')
<link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
<style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
  }
</style>

@section('libray-css')

@endsection

@section('content')
<div class="ms-16 mt-5 flex space-x-4">
  <h1 class="text-2xl font-bold">Events</h1>
  <a href="{{ route("categories.create") }}" class="bg-gray-300 text-black px-4 py-1 border border-gray-500 rounded">
    + Create
  </a>
</div>

<div class="mx-16 my-5">
  <table id="eventsTable" class="display w-full">
    <thead>
      <tr>
        <th>No</th>
        <th>Event Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $category)
      <tr>
      <td>{{ $category->category_id }}</td>
      <td>{{ $category->name }}</td>
      <td>
        <a href="{{ route('categories.edit', ['category' => $category->category_id])}}"><img width="20" height="20"
          src="https://img.icons8.com/ios/100/FAB005/pencil--v1.png" alt="pencil--v1" /></a>
        <form action="{{ route('categories.destroy', ['category' => $category->category_id]) }}" method="POST"
        style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">
          <img width="20" height="20" src="https://img.icons8.com/ios-filled/50/FA5252/delete--v1.png"
          alt="delete--v1" />
        </button>
        </form>
      </td>
      </tr>
    @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>


@endsection

@section('library-js')

<script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#eventsTable').DataTable();
  });
</script>

@endsection