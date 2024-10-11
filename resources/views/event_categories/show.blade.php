<!-- <!doctype html>
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
        .category-header {
            margin-bottom: 20px;
        }
        .category-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        .category-header h5 {
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .category-header p {
            margin: 0;
        }
        .about-section {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="category-header">
            <h1>{{ $event_categories->name }}</h1>
            <a href="{{ route('event_categories.edit', $event_categories->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('event_categories.destroy', $event_categories->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <h5>Description</h5>
            <p>{{ $event_categories->description }}</p>
        </div>

        <div class="about-section">
            <h5>About</h5>
            <p>{{ $event_categories->about }}</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html> -->
