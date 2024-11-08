<?php
include 'config.php';

// Fetch all employees from the database
$sql = "SELECT * FROM employees";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        h3 {
            color: black;
            background-color: burlywood;
            padding: 10px;
            width: 100%;
            max-width: 800px;
            text-align: center;
            margin: 0;
            border-radius: 8px 8px 0 0;
        }
        h2 {
            color: white;
            background-color: #45a049;
            padding: 10px;
            width: 100%;
            max-width: 800px;
            text-align: center;
            margin: 0;
            border-radius: 8px 8px 0 0;
        }
        .form-container, .table-container {
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 0 0 8px 8px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        form input[type="text"],
        form input[type="number"],
        form input[type="date"] {
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        form input[type="submit"] {
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }
        form input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons a {
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }
        .edit-button {
            background-color: #007bff;
            color: white;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #e74c3c;
            color: white;
        }
        .delete-button:hover {
            background-color: #c0392b;
        }
        .center-text {
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>

<h2>Employee Management System</h2>

<div class="form-container">
    <h3>Add New Employee</h3>
    <form action="insert.php" method="POST">
        <label for="employee_name">Employee Name:</label>
        <input type="text" name="employee_name" id="employee_name" required>
        
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" required>
        
        <label for="salary">Salary:</label>
        <input type="number" step="0.01" name="salary" id="salary" required>
        
        <label for="hire_date">Hire Date:</label>
        <input type="date" name="hire_date" id="hire_date" required>
        
        <input type="submit" value="Add Employee">
    </form>
</div>

<div class="table-container">
    <h3>Employee List</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Salary</th>
            <th>Hire Date</th>
            <th>Actions</th>
        </tr>

        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['position']); ?></td>
                    <td><?php echo htmlspecialchars($row['salary']); ?></td>
                    <td><?php echo htmlspecialchars($row['hire_date']); ?></td>
                    <td class="action-buttons">
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
        <?php } } else { ?>
            <tr>
                <td colspan="6" class="center-text">No employees found.</td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
$conn->close();
?>

</body>
</html>

