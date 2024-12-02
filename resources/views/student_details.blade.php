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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Latest jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <div class="container">

        <h2>All Student List
            <a href="{{ route('student-add') }}" class="btn btn-sm btn-success">Add Student</a>
            <a href="{{ route('student-deleted') }}" class="btn btn-sm btn-success">Deleted Student</a>
            <a href="{{ route('search-page') }}" class="btn btn-sm btn-success">Search Result </a>

        </h2>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered" id="studentDetails" class="display" style="width:100%">
            <thead>
                <tr class="text-center bg-dark text-white">
                    <th colspan="5">Student Details</th>
                    <th colspan="3">Parent Details</th>
                    <th rowspan="2">Action</th>
                </tr>
                <tr class="text-center bg-dark text-white">
                    <th>Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Roll No</th>
                    <th>Mobile No</th>
                    <th>Father</th>
                    <th>Mother</th>
                    <th>Parent Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr id="student-row-{{ $student->id }}">
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->class }}</td>
                        <td>{{ $student->section }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>{{ $student->studentParent->father ?? 'NA' }}</td>
                        <td>{{ $student->studentParent->mother ?? 'NA' }}</td>
                        <td>{{ $student->studentParent->father_phone ?? 'NA' }}</td>
                        <td>
                            <!-- View button to open modal -->
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal{{ $student->id }}"
                                class="btn btn-sm btn-primary"> <i class="bi bi-eye"></i>View</a>
                            <!-- Edit button (you can implement the edit functionality later) -->

                            <a href="{{ route('student-update', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-warning mb-1"> <i class="bi bi-pencil-square"></i> Student</a>
                            @if (empty($student->studentParent->father))
                                <a href="{{ route('student-parentStore', ['id' => $student->id]) }}"
                                    class="btn btn-sm btn-warning mb-1"> <i class="bi bi-plus-circle-fill"></i>
                                    Parent</a>
                            @else
                                <a href="{{ route('parent-update', ['id' => $student->studentParent->id]) }}"
                                    class="btn btn-sm btn-warning mb-1"> <i class="bi bi-pencil-square"></i> Parent</a>
                            @endif
                            {{-- @if (!$student->studentParent->father)
                                <a href="{{ route('student-parentStore', ['id' => $student->id]) }}"
                                    class="btn btn-sm btn-success">Add Parent</a>
                            @endif --}}
                            <!-- Delete button (you can implement the delete functionality later) -->
                            {{-- <a href="javascript:void(0)"
                                onclick="confirmDelete('{{ route('student-delete', ['id' => $student->id]) }}' , {{ $student->id }})"
                                class="btn btn-sm btn-danger">Delete</a> --}}
                            <a href="javascript:void(0)" onclick="confirmDelete({{ $student->id }})"
                                class="btn btn-sm btn-danger">Delete</a>

                            <a href="{{ route('student-result', ['id' => $student->id]) }}"
                                class="btn btn-sm btn-warning">Result</a>

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
                                    <a href="{{ route('student-details') }}" class="btn btn-sm btn-dark"> <i
                                            class="bi bi-arrow-return-left"></i>
                                        Back</a>
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        function confirmDelete(id) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You want to delete : ",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes',
                                cancelButtonText: 'No',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        url: `student-delete/${id}`,
                                        type: 'DELETE',
                                        data: {
                                            _token: '{{ csrf_token() }}' // Include CSRF token for security
                                        },
                                        success: function(response) {
                                            if (response.success) {
                                                Swal.fire(
                                                    'Deleted!',
                                                    response.message,
                                                    'success'
                                                );
                                                // Remove the row dynamically without reloading the page
                                                $(`#student-row-${id}`).remove();
                                            } else {
                                                Swal.fire(
                                                    'Error!',
                                                    'Unable to delete the student. Please try again.',
                                                    'error'
                                                );
                                            }
                                        },
                                        error: function(xhr) {
                                            Swal.fire(
                                                'Error!',
                                                'Something went wrong. Please try again.',
                                                'error'
                                            );
                                        }
                                    });
                                }
                            });
                        }
                    </script>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script>
        // new DataTable('#studentDetails');
        new DataTable('#studentDetails', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    </script>
</body>

</html>
