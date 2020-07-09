<?php

require_once '../PHP/session.php';
require_once '../PHP/db_connect.php';

if(isset($_POST['login-button']))
{
    $user = $_POST['user-name']; 
    $password = $_POST['user-password'];

    try
    {
        $SQLQuery = "SELECT * FROM users WHERE username = :username";
        $statement = $conn->prepare($SQLQuery);
        $statement->execute(array(':username' => $user));

        while($row = $statement->fetch())
        {
            $id = $row['id'];
            $hashed_password = $row['password'];
            $username = $row['username'];
            
            if($password === $hashed_password)
            {
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;

                if( $row['role'] == 'admin'){header('location: admin_page.php');}

                else{header('location: student_page.php');}
                
            }

            else
            {

                echo '<script type="text/javascript">
                alert("invalid username or password");
                window.location = "http://localhost:9090/main_page/index.html"; 
                </script>';

            }

        }

        if($user != $username)
        {
            echo '<script type="text/javascript">
            alert("invalid username or password");
            window.location = "http://localhost:9090/main_page/index.html"; 
            </script>';
        }

    }

    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
        header('location: ../main_page/index.html');  
    }

}

?>