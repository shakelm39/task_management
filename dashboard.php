<?php 

    session_start();
    
    $username = $_SESSION['username'];
    if(!isset($username)){
        $msg = "Login first";
        header('location:index.php?msg='.$msg);
        
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
                        <li>
                                <li><a href="logout.php">Logout</a></li>
                            
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <table>
                <thead>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Task</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php 
                        $users = json_decode(file_get_contents('users.json'), true);
                        $sln = 1;
                        foreach($users as $key=>$user){
                    ?>
                    <tr>
                        <td><?php echo $sln;?></td>
                        <td><?php echo $username;?></td>
                    </tr>
                    <?php
                    $sln++; 
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>