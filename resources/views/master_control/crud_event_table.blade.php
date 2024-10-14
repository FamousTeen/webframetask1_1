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

  .label-info {
    background-color: #5bc0de
  }

  .label-info[href]:focus,
  .label-info[href]:hover {
    background-color: #31b0d5
  }

  .label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em
  }

  a.label:focus,
  a.label:hover {
    color: #fff;
    text-decoration: none;
    cursor: pointer
  }

  .label:empty {
    display: none
  }

  .btn .label {
    position: relative;
    top: -1px
  }

  .checkbox label,
  .radio label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer
  }

  .btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da
  }

  .btn-info.disabled,
  .btn-info.disabled.active,
  .btn-info.disabled.focus,
  .btn-info.disabled:active,
  .btn-info.disabled:focus,
  .btn-info.disabled:hover,
  .btn-info[disabled],
  .btn-info[disabled].active,
  .btn-info[disabled].focus,
  .btn-info[disabled]:active,
  .btn-info[disabled]:focus,
  .btn-info[disabled]:hover,
  fieldset[disabled] .btn-info,
  fieldset[disabled] .btn-info.active,
  fieldset[disabled] .btn-info.focus,
  fieldset[disabled] .btn-info:active,
  fieldset[disabled] .btn-info:focus,
  fieldset[disabled] .btn-info:hover {
    background-color: #5bc0de;
    border-color: #46b8da
  }

  .btn-info .badge {
    color: #5bc0de;
    background-color: #fff
  }

  .label-info {
    background-color: #5bc0de;
  }

  .progress-bar-info {
    background-color: #5bc0de
  }

  .bootstrap-tagsinput {
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    display: inline-block;
    padding: 4px 6px;
    color: #555;
    vertical-align: middle;
    border-radius: 4px;
    max-width: 100%;
    line-height: 22px;
    cursor: text;
  }

  .bootstrap-tagsinput input {
    border: none;
    box-shadow: none;
    outline: none;
    background-color: transparent;
    padding: 0 6px;
    margin: 0;
    width: auto;
    max-width: inherit;
  }

  .bootstrap-tagsinput.form-control input::-moz-placeholder {
    color: #777;
    opacity: 1;
  }

  .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
    color: #777;
  }

  .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
    color: #777;
  }

  .bootstrap-tagsinput input:focus {
    border: none;
    box-shadow: none;
  }

  .bootstrap-tagsinput .tag {
    margin-right: 2px;
    color: white;
  }

  .bootstrap-tagsinput .tag [data-role="remove"] {
    margin-left: 8px;
    cursor: pointer;
  }

  .bootstrap-tagsinput .tag [data-role="remove"]:after {
    content: "x";
    padding: 0px 2px;
  }

  .bootstrap-tagsinput .tag [data-role="remove"]:hover {
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  }

  .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  }

  .icon-github {
    background: no-repeat url('../img/github-16px.png');
    width: 16px;
    height: 16px;
  }

  .bootstrap-tagsinput {
    width: 100%;
  }

  .accordion {
    margin-bottom: -3px;
  }

  .accordion-group {
    border: none;
  }

  .twitter-typeahead .tt-query,
  .twitter-typeahead .tt-hint {
    margin-bottom: 0;
  }

  .twitter-typeahead .tt-hint {
    display: none;
  }

  .tt-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    list-style: none;
    font-size: 14px;
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    cursor: pointer;
  }

  .tt-suggestion {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333333;
    white-space: nowrap;
  }

  .tt-suggestion:hover,
  .tt-suggestion:focus {
    color: #ffffff;
    text-decoration: none;
    outline: 0;
    background-color: #428bca;
  }
</style>

@section('libray-css')

@endsection

@section('content')
<div class="ms-16 mt-5 flex space-x-4">
  <h1 class="text-2xl font-bold">Events</h1>
  <a href="{{ route("createEvent") }}" class="bg-gray-300 text-black px-4 py-1 border border-gray-500 rounded">
    + Create
  </a>
</div>

<div class="mx-16 my-5">
  <table id="eventsTable" class="display">
    <thead>
      <tr>
        <th>No</th>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Organizer</th>
        <th>About</th>
        <th>Tags</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allEvent as $event)
      <tr>
      <td>{{ $event->event_id }}</td>
      <td>{{ $event->title }}</td>
      <td>{{ date("D, M j Y", strtotime($event->date)) }}
        {{$event->start_time}} AM
      </td>
      <td>{{ $event->venue }}</td>
      <td>{{ $event->organizer->name }}</td>
      <td>{{ $event->description }}</td>
      <td>
        @if ($event->tags)
        <?php 
        $all_tag = DB::table('tags')->where('event_id', $event->event_id)->get();
        ?>
        @foreach ($all_tag as $tag)
      <div class="my-4">
      <span class="tag label label-info">{{$tag->title}}</span>
      </div>
    @endforeach
    @endif
      </td>
      <td>
        <a href="{{ route('editEvent', ['id' => $event->event_id])}}"><img width="20" height="20"
          src="https://img.icons8.com/ios/100/FAB005/pencil--v1.png" alt="pencil--v1" /></a>
        <form action="{{ route('events.destroy', ['event' => $event->event_id]) }}" method="POST"
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