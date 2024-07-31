<?php
$conn = new mysqli('localhost', 'root', '', 'chattest');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT test1.username, test2.message_body, test2.timestamp FROM test2 JOIN test1 ON test2.sender = test1.id ORDER BY test2.timestamp ASC");
$messages = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
$conn->close();

echo json_encode(['messages' => $messages]);
?>
