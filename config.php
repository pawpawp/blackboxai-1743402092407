<?php
// Database configuration for XAMPP
$host = 'localhost';
$dbname = 'file_tracking';
$username = 'root';
$password = '';

// Start session for message passing
session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Database error occurred. Please try again later.");
}
?>