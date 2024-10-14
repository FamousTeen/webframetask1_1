<?php
use Illuminate\Support\Facades\DB;
?>

@extends('index')
<style>
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
<div class="ms-16">
    <p class="mt-5 text-xl">{{$event->event_category->name}}</p>
    <h1 class="text-2xl font-bold">{{$event->title}}</h1>
    <img src="https://media.istockphoto.com/id/1412045138/id/foto/pasar-malam-phuket-walking-street-di-phuket.jpg?s=2048x2048&w=is&k=20&c=Zwgcq0C1ocwZ1wrhbhdNNCNTY_oNVMkAEd2KfVwbK3U="
        class="w-[500px] mt-5" alt="">
    <br>
    <div class="grid grid-cols-3">
        <div class="grid grid-cols-2">
            <h2 class="text-xl font-semibold mb-3">Organizer</h2>

            <h2 class="text-xl ms-16 font-semibold">Booking URL</h2>

            <p class="mb-12">{{ $event->organizer->name }}</p>

            <p class="mb-12">{{ $event->booking_url }}</p>

            <h2 class="text-xl mb-3 font-semibold">Date and time</h2>

            <h2 class="text-xl ms-16 mb-3 font-semibold">Location</h2>

            <p>{{ date("D, M j Y", strtotime($event->date)) }} -
                {{$event->start_time}} AM
            </p>

            <p class="ms-16">{{ $event->venue }}</p>
        </div>
    </div>
    <br>
    <h2 class="text-xl font-semibold">About This Event</h2>
    <p>{{$event->description}}</p>

    <br>
    <h2 class="text-xl font-semibold">Tags</h2>
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
</div>


@endsection

@section('library-js')

@endsection