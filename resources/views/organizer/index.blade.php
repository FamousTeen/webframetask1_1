<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizers</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
@extends('layouts.app')

@section('title', 'Events') <!-- Set the title specific to this page -->

@section('content') <!-- Start the content section -->
    <div class="container mt-5">
        <h1>Organizers</h1>
        <a href="{{ route('organizer.create') }}" class="btn btn-primary">Create</a>
        <table id="organizersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>About</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizers as $organizer)
                <tr>
                    <td>{{ $organizer->id }}</td>
                    <td>{{ $organizer->name }}</td>
                    <td>{{ $organizer->description }}</td>
                    <td>
                        <a href="{{ route('organizer.show', $organizer->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('organizer.edit', $organizer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('organizer.destroy', $organizer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#organizersTable').DataTable();
        });
    </script>
@endsection <!-- End the content section -->
</body>
</html>
