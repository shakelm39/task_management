<?php 

    session_start();
    
    $username = $_SESSION['username'];

    if(!isset($username)){
        $msg = "Login first";
        header('location:index.php?msg='.$msg);
        
    }
    //task add 
    if(isset($_POST['add_task'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $deadline = $_POST['deadline'];
        
        if(empty($title) || empty($description) || empty($deadline)){
            $msg = "Filed must not be empty !!";
        }else{
            $data = json_decode(file_get_contents('tasks.json'), true);

            
                $ln=1;
            
                
                $data[$username][]=[
                    'id'=>'1',
                    'title'=> $title,
                    'description'=>$description,
                    'deadline'=>$deadline
                ];
                file_put_contents(('tasks.json'), json_encode($data,JSON_PRETTY_PRINT));
            
        
       
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
                        <li><a href="#">Your Tasks</a></li>
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
            <h2 style="color:red;"><?php if(isset($msg)){echo $msg;}?></h2>
            <form action="" method="POST">
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="title" placeholder="Enter title"></td>
                        <td><input type="text" name="description" placeholder="Enter description"></td>
                        <td><input type="date" name="deadline" placeholder="Enter Deadline"></td>
                        <td><input type="submit" class="task_btn" name="add_task" value="Add Task"></td>
                    </tr>
                </table>
            </form>
            <h2>Your Task</h2>
            <table class="table">
                <tr>
                    <th>Sl</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Deadline</th>
                    <th>Action</th>
                </tr>
                
                    <?php
                        $tasks = json_decode(file_get_contents('tasks.json'), true);
                        if(isset($tasks[$username])):
                        $sln=1;
                        foreach($tasks[$username] as $key=>$task):
                    ?>
                   <tr>
                    <td><?php echo $sln++;?></td>
                    <td><?php echo $task['title'];?></td>
                    <td><?php echo $task['description'];?></td>
                    <td><?php echo $task['deadline'];?></td>
                    <td width="25%">
                        <a href="edit.php?id=<?php echo $task['id']; ?>" class="editBtn">Edit</a>
                        <a href="delete.php?id=<?php echo $task['id']; ?>" class="deleteBtn">Delete</a>
                    </td>
                   </tr>
                   <?php 
                    endforeach;
                    endif;
                   ?>
                        
            </table>
        </div>
    </div>
</body>
</html>

