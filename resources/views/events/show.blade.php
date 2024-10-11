<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .event-header {
            margin-bottom: 20px;
        }
        .event-image {
            width: 100%;
            height: auto;
        }
        .tags {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="event-header">
            <h1>{{ $event->title }}</h1>
            <img src="{{ asset('images/' . $event->image) }}" class="event-image" alt="{{ $event->title }}">
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5>Organizer</h5>
                <p>{{ $event->organizer->name }}</p>
            </div>
            <div class="col-md-6">
                <h5>Booking URL</h5>
                <p><a href="{{ $event->booking_url }}">{{ $event->booking_url }}</a></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5>Date and Time</h5>
                <p>{{ \Carbon\Carbon::parse($event->date)->format('D, M d Y - h:i A') }}</p>
            </div>
            <div class="col-md-6">
                <h5>Location</h5>
                <p>{{ $event->venue }}</p>
            </div>
        </div>

        <h5>About This Event</h5>
        <p>{{ $event->description }}</p>

        <h5>Tags</h5>
        <p>
            @if($event->tags)
                @foreach(explode(',', $event->tags) as $tag)
                    <span class="badge badge-info">{{ trim($tag) }}</span>
                @endforeach
            @else
                <span>No tags available</span>
            @endif
        </p>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
