@extends('layouts.app')

@section('title', 'Events') <!-- Set the title specific to this page -->

@section('content') <!-- Start the content section -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Categories</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    

    <div class="container mt-5">
        <h1>Event Categories</h1>
        <a href="{{ route('event_categories.create') }}" class="btn btn-primary">Create</a>
        <table id="event_categoriesTable" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($event_categories as $event_categorie)
                <tr>
                    <td>{{ $event_categorie->id}}</td>
                    <td>{{ $event_categorie->name }}</td>
                    <td>
                        <!-- <a href="{{ route('event_categories.show', $event_categorie->id) }}" class="btn btn-info">View</a> -->
                        <a href="{{ route('event_categories.edit', $event_categorie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('event_categories.destroy', $event_categorie->id) }}" method="POST" style="display:inline;">
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
            $('#event_categoriesTable').DataTable();
        });
    </script>
</body>
@endsection
</html>
