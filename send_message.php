<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'chattest');

$data = json_decode(file_get_contents('php://input'), true);
$message = $data['message'];
$username = $_SESSION['username'];

$conn->query("INSERT INTO test2 (username, content) VALUES ('$username', '$message')");
?>
