<?php
// payroll.php
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
        $conn->query("INSERT INTO payroll (employee_name, salary, bonus, net_pay) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')");
    }
    fclose($handle);
}

// Export CSV
if (isset($_POST['export'])) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=payroll.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Employee Name', 'Salary', 'Bonus', 'Net Pay'));
    $query = $conn->query("SELECT employee_name, salary, bonus, net_pay FROM payroll");
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
    <title>Payroll</title>
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
    <h2>Payroll Management</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" required>
        <button type="submit" name="import">Import CSV</button>
        <button type="submit" name="export">Export CSV</button>
    </form>
    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Salary</th>
            <th>Bonus</th>
            <th>Net Pay</th>
        </tr>
        <?php $result = $conn->query("SELECT * FROM payroll"); while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['employee_name']; ?></td>
                <td><?php echo $row['salary']; ?></td>
                <td><?php echo $row['bonus']; ?></td>
                <td><?php echo $row['net_pay']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
