<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'chattest');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$current_user = $_SESSION['username'];

$sql = "SELECT u.username, u.dp, 
        (SELECT COUNT(*) FROM messages m WHERE m.sender = u.username AND m.recipient = ? AND m.is_read = FALSE) AS unread
        FROM user u WHERE u.username != ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $current_user, $current_user);
$stmt->execute();
$result = $stmt->get_result();

$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

// Debugging output
// Uncomment the following line to see the raw output
// echo '<pre>' . print_r($users, true) . '</pre>';

echo json_encode($users);

$stmt->close();
$conn->close();
?>
