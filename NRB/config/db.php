<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'crvs_db';

// 1. Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// 2. Create the database if it doesn't exist
$sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";
mysqli_query($conn, $sql_db);

// 3. Select the database
mysqli_select_db($conn, $dbname);

// Set charset to utf8mb4 for safety
mysqli_set_charset($conn, "utf8mb4");
?>