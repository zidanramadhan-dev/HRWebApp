<?php
// attendance.php
include('config.php');
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Import CSV
if (isset($_POST['import'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen($file, "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $conn->query("INSERT INTO attendance (employee_name, date, status) VALUES ('$data[0]', '$data[1]', '$data[2]')");
    }
    fclose($handle);
}

// Export CSV
if (isset($_POST['export'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=attendance.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Employee Name', 'Date', 'Status'));
    $query = $conn->query("SELECT employee_name, date, status FROM attendance");
    while ($row = $query->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="employees.php">Manage Employees</a></li>
            <li><a href="attendance.php">Attendance</a></li>
            <li><a href="payroll.php">Payroll</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <h2>Attendance Records</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" required>
        <button type="submit" name="import">Import CSV</button>
        <button type="submit" name="export">Export CSV</button>
    </form>
    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php $result = $conn->query("SELECT * FROM attendance"); while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['employee_name']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['status']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>