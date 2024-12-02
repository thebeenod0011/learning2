<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Search Students</h2>
        <!-- Search Form -->
        <form method="GET" action="{{ route('search-result') }}">
            <div class="mb-3">
                <label for="student_id" class="form-label">Enter Student Id</label>
                <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student Id" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Search</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS & Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
