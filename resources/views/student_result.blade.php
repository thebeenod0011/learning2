<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container my-5">

        <div class="card">

            <div class="card-header text-center bg-primary text-white">
                <h3>Student Result</h3>
            </div>
            <div class="card-body">
                <h4>Student Details</h4>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $studentResult->name }}</td>
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td>{{ $studentResult->class }}</td>
                        </tr>
                        <tr>
                            <th>Section</th>
                            <td>{{ $studentResult->section }}</td>
                        </tr>
                        <tr>
                            <th>Roll No</th>
                            <td>{{ $studentResult->roll_no }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $studentResult->email }}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{ $studentResult->mobile }}</td>
                        </tr>
                    </tbody>
                </table>

                <h4 class="mt-4">Results</h4>
                @if ($studentResult->showResult->isNotEmpty())
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Max Marks</th>
                                <th>Obtain</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studentResult->showResult as $result)
                                <tr>
                                    <td>{{ $result->subject }}</td>
                                    <td>{{ $result->max }}</td>
                                    <td>{{ $result->obtain }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-danger">No results found for this student.</p>
                @endif
            </div>
        </div>
    </div>
   <div class="container text-center mb-10 pb-10">
    <a href="{{ route('student-details') }}" class="btn btn-sm btn-dark"> <i class="bi bi-arrow-return-left"></i>
       Back</a>
    <a href="{{ route('search-page') }}" class="btn btn-sm btn-success">Search Result </a>
   </div>
<br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
