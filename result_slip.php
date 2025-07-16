<?php
require 'includes/db_connect.php';

if (isset($_GET['reg_no'])) {
    $reg_no = $_GET['reg_no'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE reg_no = ?");
    $stmt->bind_param("s", $reg_no);
    $stmt->execute();
    $student = $stmt->get_result()->fetch_assoc();

    if ($student) {
        $stmt = $conn->prepare("SELECT subjects.code, subjects.name, marks.marks FROM marks 
                                JOIN subjects ON marks.subject_id = subjects.id 
                                WHERE marks.student_id = ?");
        $stmt->bind_param("i", $student['id']);
        $stmt->execute();
        $results = $stmt->get_result();
    } else {
        $error = "Student not found.";
    }
} else {
    $error = "Registration number missing.";
}
?>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Result Slip - KCA Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f4f7fa; }
    .navbar { background-color: #0d6efd; }
    .navbar-brand, .nav-link { color: white !important; }
    .card { box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); }
    footer { background-color: #0d6efd; color: white; text-align: center; padding: 10px 0; margin-top: 30px; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">KCA Result System</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="add_student.php">Add Student</a></li>
        <li class="nav-item"><a class="nav-link" href="add_subject.php">Add Subject</a></li>
        <li class="nav-item"><a class="nav-link" href="enter_marks.php">Enter Marks</a></li>
        <li class="nav-item"><a class="nav-link active" href="generate_slip.php">Result Slip</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card p-4">
        <h4 class="text-center mb-4">Student Result Slip</h4>

        <?php if (!empty($error)): ?>
          <div class="alert alert-danger text-center"> <?= $error ?> </div>
        <?php elseif ($student): ?>
          <p><strong>Reg No:</strong> <?= $student['reg_no'] ?></p>
          <p><strong>Name:</strong> <?= $student['name'] ?></p>
          <p><strong>Course:</strong> <?= $student['course'] ?> | <strong>Year:</strong> <?= $student['year'] ?></p>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Marks</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $results->fetch_assoc()): ?>
              <tr>
                <td><?= $row['code'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['marks'] ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<footer>&copy; 2025 KCA University - Result Management System</footer>

</body>
</html>
