<?php
$conn = new mysqli("localhost", "root", "", "user_system");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>