<?php
require_once 'includes/db_connect.php';

$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);

// Check if user exists first
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Admin user already exists.";
} else {
    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        echo "Admin user created successfully.<br>";
        echo "Username: admin<br>Password: admin123";
    } else {
        echo "Error creating user: " . $stmt->error;
    }
}
?>
