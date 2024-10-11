@extends('layouts.app')

@section('title', 'Events') <!-- Set the title specific to this page -->

@section('content') <!-- Start the content section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Organizer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Create New Organizer</h1>

        <!-- Error handling -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('organizer.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="facebook_link">Facebook Link:</label>
                <input type="url" name="facebook_link" class="form-control">
            </div>

            <div class="form-group">
                <label for="x_link">X Link:</label>
                <input type="url" name="x_link" class="form-control">
            </div>

            <div class="form-group">
                <label for="website_link">Website Link:</label>
                <input type="url" name="website_link" class="form-control">
            </div>

            <div class="form-group">
                <label for="active">Active:</label>
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" checked>            </div>

            <button type="submit" class="btn btn-primary">Create Organizer</button>
            <a href="{{ route('organizer.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
@endsection
</html>
    