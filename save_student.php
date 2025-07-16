<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<?php
require 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reg_no = $_POST['reg_no'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO students (reg_no, name, course, year) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $reg_no, $name, $course, $year);
    if ($stmt->execute()) {
        header("Location: add_subject.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
