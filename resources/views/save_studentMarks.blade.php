<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Enter Subject Marks</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Enter Marks for All Subjects</h2>
        <form method="POST" action="{{ route('store-marks') }}">
            @csrf
            <div class="mb-3">
                <label for="student_id" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required>
            </div>

            <!-- 8 Subject Marks Inputs -->
            <div class="row">
               
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-lg">Submit Marks</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS & Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
