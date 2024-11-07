<!-- resources/views/employees/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Add New Employee</title>
    <!-- Add Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Card for form layout -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-center">Add New Employee</h4>
                </div>
                <div class="card-body">
                    <!-- Form for adding a new employee -->
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <!-- Employee Name -->
                        <div class="mb-3">
                            <label for="employee_name" class="form-label">Employee Name</label>
                            <input type="text" name="employee_name" class="form-control" required>
                        </div>

                        <!-- Position -->
                        <div class="mb-3">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" required>
                        </div>

                        <!-- Salary -->
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control" required>
                        </div>

                        <!-- Hire Date -->
                        <div class="mb-3">
                            <label for="hire_date" class="form-label">Hire Date</label>
                            <input type="date" name="hire_date" class="form-control" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Add Employee</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies (optional for modal dialogs, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
