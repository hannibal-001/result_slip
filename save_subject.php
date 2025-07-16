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
    $code = $_POST['code'];
    $name = $_POST['name'];

    $stmt = $conn->prepare("INSERT INTO subjects (code, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $code, $name);
    if ($stmt->execute()) {
        header("Location: enter_marks.php"); 
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
