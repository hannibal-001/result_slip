<?php
session_start();

if (basename($_SERVER['PHP_SELF']) === 'login.php') return;

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
