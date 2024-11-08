<?php
include 'config.php';

// Get the employee ID from the URL parameter
$id = $_GET['id'];

// Fetch the current data for the employee from the database
$sql = "SELECT * FROM employees WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

// Check if the employee exists
if (!$employee) {
    echo "Employee not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #e3f2fd, #f9f9f9);
        }
        .form-container {
            width: 350px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background-color: #ffffff;
        }
        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #555;
            font-size: 14px;
        }
        form input[type="text"],
        form input[type="number"],
        form input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        form input[type="text"]:focus,
        form input[type="number"]:focus,
        form input[type="date"]:focus {
            border-color: #45a049;
            outline: none;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 12px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Employee</h2>
    <form action="update.php" method="POST">
        <!-- Hidden field to store the employee ID -->
        <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">

        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" value="<?php echo htmlspecialchars($employee['employee_name']); ?>" required>

        <label for="position">Position:</label>
        <input type="text" name="position" id="position" value="<?php echo htmlspecialchars($employee['position']); ?>" required>

        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary" value="<?php echo htmlspecialchars($employee['salary']); ?>" required>

        <label for="hire_date">Hire Date:</label>
        <input type="date" name="hire_date" id="hire_date" value="<?php echo htmlspecialchars($employee['hire_date']); ?>" required>

        <input type="submit" value="Update Employee">
    </form>
</div>

<?php
$stmt->close();
$conn->close();
?>

</body>
</html>

