@extends('layouts.app')

@section('title', 'Events') <!-- Set the title specific to this page -->

@section('content') <!-- Start the content section -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Events</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    

    <div class="container mt-5">
        <h1>Events</h1>
        <a href="{{ route('masterEvents.create') }}" class="btn btn-primary">Create</a>
        <table id="masterEventsTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Organizer</th>
                    <th>About</th>
                    <th>Tags</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($masterEvents as $masterEvent)
                <tr>
                    <td>{{ $masterEvent->id }}</td>
                    <td>{{ $masterEvent->title }}</td>
                    <td>{{ $masterEvent->date }}</td>
                    <td>{{ $masterEvent->venue }}</td>
                    <td>{{ $masterEvent->organizer->name }}</td>

                    <td>{{ $masterEvent->description }}</td>
                    <td>{{ implode(', ', array: explode(',', $masterEvent->tags)) }}</td>
                    <td>
                        <a href="{{ route('masterEvents.edit', $masterEvent->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('masterEvents.destroy', $masterEvent->id) }}" method="POST" style="display:inline;">
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

    <script>
        $(document).ready(function() {
            $('#masterEventsTable').DataTable();
        });
    </script>
</body>
@endsection
</html>
