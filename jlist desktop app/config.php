<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e.joshua.todo.list";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>