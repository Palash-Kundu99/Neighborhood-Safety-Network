<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'chattest');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users and their profile pictures from 'test1'
$result = $conn->query("SELECT username, dp FROM test1");
$users = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row; // Changed to indexed array for easier iteration
    }
}
$conn->close();

// Get the logged-in username
$loggedInUser = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <link rel="stylesheet" href="css/communication.css">
    <script src="chat.js" defer></script>
</head>
<body data-logged-in-user="<?php echo htmlspecialchars($loggedInUser); ?>">
    <div class="chat-container">
        <div class="chat-header">
            <h2>𝐂𝐨𝐦𝐦𝐮𝐧𝐢𝐭𝐲 𝐂𝐡𝐚𝐭𝐫𝐨𝐨𝐦</h2>
            <button class="logout-btn" onclick="window.location.href='index1.php'">Logout</button>
        </div>
        <div class="chat-content">
            <div class="users-list">
                <h3>Participants</h3>
                <ul id="users">
                    <?php foreach ($users as $user): ?>
                        <li>
                            <img src="uploads/<?php echo htmlspecialchars($user['dp']); ?>" 
                                 alt="Profile Picture" 
                                 class="user-dp" 
                                 onError="this.onerror=null; this.src='uploads/default.jpg';">
                            <span><?php echo htmlspecialchars($user['username']); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="chat-box">
                <div class="messages" id="messages">
                    <!-- Messages will be populated by JavaScript -->
                </div>
                <form id="messageForm">
                    <input type="text" id="messageInput" placeholder="Type a message..." required>
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <div class="logged-in-user">
            <p>𝐻𝐸𝐿𝐿𝒪:  <?php echo htmlspecialchars($loggedInUser); ?></p>
        </div>
    </div>
</body>
</html>
