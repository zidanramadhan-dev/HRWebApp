<?php
// config.php
$host = 'localhost:8111';
$user = 'root';
$pass = '';
$dbname = 'hrd_db';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>