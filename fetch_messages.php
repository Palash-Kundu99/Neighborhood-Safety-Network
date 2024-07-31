<?php
$conn = new mysqli('localhost', 'root', '', 'chattest');
$result = $conn->query("SELECT * FROM test2 ORDER BY created_at DESC");
$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}
echo json_encode(['messages' => $messages]);
?>
