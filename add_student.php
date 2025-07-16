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
  <title>Add Student - KCA Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f7fa;
    }
    .navbar {
      background-color: #0d6efd;
    }
    .navbar-brand, .nav-link {
      color: white !important;
    }
    .card {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    footer {
      background-color: #0d6efd;
      color: white;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">KCA Result System</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
       
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4">
        <h4 class="mb-4 text-center">Add New Student</h4>
        <form method="POST" action="save_student.php">
          <input type="text" class="form-control mb-3" name="reg_no" placeholder="Registration Number" required>
          <input type="text" class="form-control mb-3" name="name" placeholder="Full Name" required>
          <input type="text" class="form-control mb-3" name="course" placeholder="Course" required>
          <input type="number" class="form-control mb-3" name="year" placeholder="Year" required>
          <button type="submit" class="btn btn-success w-100">Save Student</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer>&copy; 2025 KCA University - Result Management System</footer>

</body>
</html>
