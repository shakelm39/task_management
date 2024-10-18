<?php 


    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password =  password_hash($_POST['password'], PASSWORD_BCRYPT);
        $users = json_decode(file_get_contents('users.json'), true);
        //empty data validation 
        if($username=="" ||  $password==""){
            $msg = "Username or Password is empty";
            
        }else{
            if(isset($users[$username])){
                echo "User already exist";
            }else{
            $users[$username] =['password'=>$password];
            file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
            $msg =  "User registration successfull!";
            }
        }
        

        
    }

?>

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
                <h3 style="color:red; text-align:center">
                    <?php 
                if(isset($msg)){
                    echo $msg;
                }
            
            ?>
            </h3>
            <form action="" method="POST" class="myform">
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