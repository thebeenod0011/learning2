<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parent Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">{{ $student->name }}'s Parents Details <a href="{{ route('student-details') }}"
                class="btn btn-sm btn-dark">Student List </a></h2>


        <form method="post" action="{{ route('student-parentStoreSave') }}">
            @csrf
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Father Name</label>
                    <input type="text" class="form-control" id="name" name="father" value=""
                        placeholder="Enter your name" required>
                    <input type="text" class="form-control" id="name" name="student_id"
                        value="{{ $student->id }}" placeholder="Enter your name" hidden>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Mother Name</label>
                    <input type="text" class="form-control" id="name" name="mother" value=""
                        placeholder="Enter your name" required>
                </div>
                <!-- Class -->
                <div class="mb-3 col-md-6">
                    <label for="class" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="class" min="1" max="12"
                        name="father_phone" placeholder="Enter your class" required>
                </div>
            </div>
            <a href="{{ route('student-details') }}" class="btn btn-sm btn-dark"> <i class="bi bi-arrow-return-left"></i>
                Back</a>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
