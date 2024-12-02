<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parent Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Parents Details <a href="{{ route('student-details') }}"
                class="btn btn-sm btn-dark">  Student List <i class="bi bi-card-list"></i></a></h2>


        <form method="post" action="{{ route('parent-UpdateSave', ['id' => $studentparent->studentParent->id]) }}">
            @csrf
            <div class="row">
                <!-- Name -->
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Father Name</label>
                    <input type="text" class="form-control" id="name" name="father" value="{{$studentparent->studentParent->father}}"
                        placeholder="Enter your name" required>
                    
                </div>
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Mother Name</label>
                    <input type="text" class="form-control" id="name" name="mother" value="{{$studentparent->studentParent->mother}}"
                        placeholder="Enter your name" required>
                </div>
                <!-- Class -->
                <div class="mb-3 col-md-6">
                    <label for="class" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="class" min="1" value="{{$studentparent->studentParent->father_phone}}" max="12"
                        name="father_phone" placeholder="Enter your class" required>
                </div>
            </div>

            <!-- Submit Button -->
            <a href="{{ route('student-details') }}"class="btn btn-sm btn-dark"> <i class="bi bi-arrow-return-left"></i> Back </a>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
