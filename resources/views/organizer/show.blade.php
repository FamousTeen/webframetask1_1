
@extends('layouts.app')

@section('title', 'Events') <!-- Set the title specific to this page -->

@section('content') <!-- Start the content section -->
<!doctype html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .organizer-header {
            margin-bottom: 20px;
        }
        .organizer-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .organizer-header h5 {
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .organizer-header p {
            margin: 0;
        }
        .about-section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="organizer-header">
            <h1>{{ $organizer->name }}</h1>
            <a href="{{ route('organizer.edit', $organizer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('organizer.destroy', $organizer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
            <h5>Facebook</h5>
            <p>{{ $organizer->facebook_link }}</p>
            <h5>X</h5>
            <p>{{ $organizer->x_link }}</p>
            <h5>Website</h5>
            <p>{{ $organizer->website_link }}</p>
        </div>

        <div class="about-section">
            <h5>About</h5>
            <p>{{ $organizer->description }}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
