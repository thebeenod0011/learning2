<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update {{ $data->name }}'s Details 
            <a href="{{ route('student-list') }}" class="btn btn-sm btn-dark">Student List </a>
        </h2>


        {{-- <form method="post" action="{{ route('student-store') }}"> --}}
        <form method="post" action="{{ route('student-updateSave', $data->id) }}">
            @csrf
            <div class="row">


                <!-- Name -->
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}"
                        placeholder="Enter your name" required>
                </div>

                <!-- Class -->
                <div class="mb-3 col-md-6">
                    <label for="class" class="form-label">Class</label>
                    <input type="text" class="form-control" id="class" min="1" max="12"
                        value="{{ $data->class }}" name="class" placeholder="Enter your class" required>
                </div>

                <!-- Section -->
                <div class="mb-3 col-md-6">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" class="form-control" id="">

                        <option value="A" {{ $data->section == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $data->section == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $data->section == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $data->section == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </div>

                <!-- Roll No -->
                <div class="mb-3 col-md-6">
                    <label for="roll_no" class="form-label">Roll No</label>
                    <input type="number" class="form-control" min="1" max="100" id="roll_no"
                        value="{{ $data->roll_no }}" name="roll_no" placeholder="Enter your roll number" required>
                </div>

                <!-- Email -->
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $data->email }}"
                        name="email" placeholder="Enter your email" required>
                </div>

                <!-- Mobile -->
                <div class="mb-3 col-md-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile"
                        value="{{ $data->mobile }}" placeholder="Enter your mobile number" required>
                </div>

                <!-- Pincode -->
                <div class="mb-3 col-md-6">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="pincode" name="pincode"
                        value="{{ $data->pincode }}" placeholder="Enter your pincode" required>
                </div>

                <!-- City -->
                <div class="mb-3 col-md-6">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city"
                        value="{{ $data->city }}" placeholder="Enter your city" required>
                </div>

                <!-- Address -->
                <div class="mb-3 col-md-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required>{{ $data->address }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('student-details') }}"
            class="btn btn-sm btn-dark"> <i class="bi bi-arrow-return-left"></i> Back </a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
