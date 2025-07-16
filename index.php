<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - KCA Result System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
      margin-top: 50px;
    }
    footer {
      background-color: #0d6efd;
      color: white;
      padding: 10px 0;
      position: fixed;
      width: 100%;
      bottom: 0;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">KCA Result System</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card p-4 text-center">
        <h4 class="mb-4">Welcome to the Admin Dashboard</h4>
        <a href="add_student.php" class="btn btn-success btn-lg w-100">Add Student</a>
      </div>
    </div>
  </div>
</div>

<footer class="text-center">
  &copy; 2025 KCA University - Result Management System
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
