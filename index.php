<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "products_22";
// Створення з'єднання
$conn1 = new mysqli($servername, $username, $password);
// Перевірка з'єднання
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}
// Створення бази даних
$sql = "CREATE DATABASE $dbname";
if ($conn1->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn1->error;
}
$conn1->close();
include("tables.php");
