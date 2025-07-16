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
    $subject_code = $_POST['subject_code'];
    $marks = $_POST['marks'];

    $studentQ = $conn->prepare("SELECT id FROM students WHERE reg_no = ?");
    $studentQ->bind_param("s", $reg_no);
    $studentQ->execute();
    $studentResult = $studentQ->get_result();
    $student = $studentResult->fetch_assoc();
    $subjectQ = $conn->prepare("SELECT id FROM subjects WHERE code = ?");
    $subjectQ->bind_param("s", $subject_code);
    $subjectQ->execute();
    $subjectResult = $subjectQ->get_result();
    $subject = $subjectResult->fetch_assoc();

    if ($student && $subject) {
        $stmt = $conn->prepare("INSERT INTO marks (student_id, subject_id, marks) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $student['id'], $subject['id'], $marks);
        if ($stmt->execute()) {
            header("Location: generate_slip.php"); // Redirect to next page
            exit();
        } else {
            echo "Error inserting marks: " . $stmt->error;
        }
    } else {
        echo "Student or Subject not found.";
    }
}
?>
