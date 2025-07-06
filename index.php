<?php
session_start();
include('config.php');

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRD Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to HRD System</h1>
    <nav>
        <ul>
            <li><a href="employees.php">Manage Employees</a></li>
            <li><a href="attendance.php">Attendance</a></li>
            <li><a href="payroll.php">Payroll</a></li>
            <li><a href="import_export.php">Import/Export CSV</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <p>HRD Dashboard for managing employees, tracking attendance, and handling payroll.</p>
</body>
</html>

