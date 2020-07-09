<?php

include_once 'session.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update user details</title>
    <link rel="stylesheet" href="../main_page/main_page.css">
    <style type="text/css">
    

        form
        {
            height:100%;
            align:center;
            width:600px;

            margin-left:800px;
            margin-top:-400px;
        }

        form button
        {
            width:40%;
            height:50px;
            align:center;
            margin:500px ;
            
        }


    </style>

</head>
<body>
    <center>    <h2>update your details here</h2></center>

    <div id="right-form" class="form hide-form"> 

        <form action="" method="post">
            <input type="text" name="username" class="input-box" placeholder="user name">
            <input type="email" name="useremail" class="inpu-box" placeholder="E-mail">
            <input type="password" name="userpassword" class="input-box" placeholder="password">
            Choose your role<br>

            Admin <input type="radio" name="role" value="admin">
            student<input type="radio" name="role" value="student">   
            <button type="submit" class="button" name="update_user_info" style="height:50px;">update</button>
            <button type="submit" class="button" name="return" action="" >return to your page</button>

        </form>
    </div>

</body>
</html>

 
 <?php 
require_once 'db_connect.php';


if(isset($_POST['update_user_info']))
{
    $Id = $_SESSION['id']; 
    

    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username = '$username', 
        email = '$email',
        password = '$password',
        role = '$role' WHERE id = '$Id'";
        
        $_SESSION['role'] = $role; 

    $executed = $conn->query($query);
    if($executed)
    {
        
        echo '<script type="text/javascript">alert("Data updated");</script>';

        
    }

    else
    {
        echo '<script type="text/javascript">alert("Data Not Updated")</script>';
    }

}

if (isset($_POST['return']))
{
    
    if( $_SESSION['role'] == 'admin')
    {
         header('location: admin_page.php');
    }
    else
    {
        header('location: student_page.php');
    }    
}


?> 


