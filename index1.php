<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/communication.css">
</head>
<body>
    <div class="container text-center">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="Neighborhood Safety Logo" style="height: 90px;">
            </a>
        </div>
        <div class="mt-4">
            <div class="d-flex justify-content-center mb-4">
                <h1>𝐖𝐞𝐥𝐜𝐨𝐦𝐞, 𝐄𝐧𝐠𝐚𝐠𝐞 𝐢𝐧 𝐂𝐨𝐧𝐯𝐞𝐫𝐬𝐚𝐭𝐢𝐨𝐧!</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5 mb-4">
                    <div class="card">
                        <div class="card-header">𝐀𝐥𝐫𝐞𝐚𝐝𝐲 𝐑𝐞𝐠𝐢𝐬𝐭𝐞𝐫𝐞𝐝? 𝐁𝐞𝐠𝐢𝐧 𝐇𝐞𝐫𝐞.</div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <div class="form-group">
                                    <label for="loginUsername">Username</label>
                                    <input type="text" class="form-control" id="loginUsername" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="loginPassword">Password</label>
                                    <input type="password" class="form-control" id="loginPassword" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">𝗡𝗲𝘄 𝗨𝘀𝗲𝗿? 𝗥𝗲𝗴𝗶𝘀𝘁𝗲𝗿 𝗧𝗼𝗱𝗮𝘆.</div>
                        <div class="card-body">
                            <form action="register.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="registerUsername">Username</label>
                                    <input type="text" class="form-control" id="registerUsername" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="registerPassword">Password</label>
                                    <input type="password" class="form-control" id="registerPassword" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="dp">Profile Picture</label>
                                    <input type="file" class="form-control" id="dp" name="dp" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-success">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
