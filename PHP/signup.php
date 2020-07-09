<?php

require_once 'db_connect.php';


if (isset($_POST['signup-button']))
{
    $username = $_POST['user-name'];
    $email = $_POST['user-email'];
    $password = $_POST['user-password'];
    $hashed_password = $password;
    $role = $_POST['role'];

    try
    {    
        $SQLInsert = "INSERT INTO users(username, password, email, role, to_date)
                       VALUES(:username, :password, :email, :role, now()) ";
    
        $statement = $conn->prepare($SQLInsert);
        $statement->execute(array(':username' => $username, 
        ':password' => $hashed_password,
        ':email' => $email,
        ':role' => $role ));
    
        if($statement->rowCount() == 1)
        {
            header('location: ../main_page/index.html');
        }
    }
    
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
        
}


?>