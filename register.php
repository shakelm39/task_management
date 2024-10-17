<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="head">
            <div class="menu">
                <div class="logo">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                    </ul>
                </div>
                <div class="loginregister">
                    <ul>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="register.php">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <h2>Registration Form</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <input class="btn" type="submit" name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</body>
</html>