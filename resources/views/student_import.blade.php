<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Student</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Student Import</h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <!-- Search Form -->
        <form method="POST" enctype="multipart/form-data" action="{{ route('student-import') }}">
            @csrf
            <div class="mb-3">
                <label for="student_id" class="form-label">Choose CSV file</label>
                <input type="file" class="form-control" id="csv" name="csv" placeholder="" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Import</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS & Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
