<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $profilePicture = $_FILES['dp'];

    // Handle file upload
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($profilePicture['name']);
    if (move_uploaded_file($profilePicture['tmp_name'], $uploadFile)) {
        $dpPath = basename($profilePicture['name']);
    } else {
        $dpPath = 'default.png'; // Default profile picture if upload fails
    }

    $conn = new mysqli('localhost', 'root', '', 'chattest');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO test1 (username, password, dp) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $dpPath);
    
    if ($stmt->execute()) {
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Inline CSS for Registration Page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e5ddd5; /* Matching background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/wall.jpg'); 
        }

        .container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
            text-align: center;
        }

        h2 {
            color: #128c7e; /* WhatsApp green */
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            background-color: #128c7e; /* WhatsApp green for button */
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #0d6e4e; /* Darker green for hover */
        }

        p {
            margin-top: 20px;
        }

        a {
            color: #128c7e; /* WhatsApp green for links */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="dp">Profile Picture</label>
                <input type="file" id="dp" name="dp">
            </div>
            <button type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>
