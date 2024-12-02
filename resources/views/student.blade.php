<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">

        <h2>All Student List
            <a href="{{ route('student-details') }}" class="btn btn-sm btn-success"> Student with Parent</a>
            <a href="{{ route('student-add') }}" class="btn btn-sm btn-success">Add Student</a>
            <a href="{{ route('student-deleted') }}" class="btn btn-sm btn-success">Deleted Student</a>
            <a href="{{ route('search-page') }}" class="btn btn-sm btn-success">Search Result </a>

        </h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Roll No</th>
                    <th>Mobile No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->section }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>
                            <!-- View button to open modal -->
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal{{ $student->id }}"
                                class="btn btn-sm btn-primary">View</a>
                            <!-- Edit button (you can implement the edit functionality later) -->

                            <a href="{{ route('student-update', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-warning"> Edit</a>
                            <!-- Delete button (you can implement the delete functionality later) -->
                            {{-- <a href="{{ route('student-delete', ['id' => $student->id]) }}"class="btn btn-sm btn-danger">Delete</a> --}}
                            
                            <a href="{{ route('student-parentStore', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-success">Add Parent</a>
                            <a href="{{ route('student-result', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-warning">Show Result</a>
                        </td>
                    </tr>

                    <!-- The Modal for the current student -->
                    <div class="modal fade" id="myModal{{ $student->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel{{ $student->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel{{ $student->id }}">View Student Details
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Modal Body with Student Data -->
                                <div class="modal-body">
                                    <p><strong>Name:</strong> {{ $student->name }}</p>
                                    <p><strong>Class:</strong> {{ $student->class }}</p>
                                    <p><strong>Section:</strong> {{ $student->section }}</p>
                                    <p><strong>Roll No:</strong> {{ $student->roll_no }}</p>
                                    <p><strong>Email:</strong> {{ $student->email }}</p>
                                    <p><strong>Mobile:</strong> {{ $student->mobile }}</p>
                                    <p><strong>Pincode:</strong> {{ $student->pincode }}</p>
                                    <p><strong>City:</strong> {{ $student->city }}</p>
                                    <p><strong>Address:</strong> {{ $student->address }}</p>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                @endforeach

            </tbody>
        </table>
    </div>

</body>

</html>
