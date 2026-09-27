<?php
// Har page mein session use hoga login check karne ke liye
session_start();

$host = 'localhost';
$dbname = 'employee_management';
$username = 'root';
$password = ''; // XAMPP/WAMP mein default khaali hota hai

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
