<?php
// ============================================================================
// Database Setups and Functions
// ============================================================================
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$host = 'localhost';     
$db   = 'dbonlineshoppingwebsite';
$user = 'root';
$pass = '';

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}