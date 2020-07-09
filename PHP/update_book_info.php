<?php

include_once 'session.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update book details</title>
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
    <center><h1>update book details</h1></center>

    <div id="right-form" class="form hide-form"> 
                
        <form action="" method="post">
            <input type="text" name="book_id" class="input-box" placeholder="book_id">
            <input type="text" name="name" class="input-box" placeholder="book name">
            <input type="text" name="pubyear" class="inpu-box" placeholder="publication year">
            <input type="text" name="author" class="input-box" placeholder="author name">
            <input type="text" name="isbn" class="input-box" placeholder="ISBN">
            
            <button type="submit" class="button" name="update" >Update</button>
            <button type="submit" class="button" name="return"  >return to your page</button>

        </form>
    </div>

</body>
</html>

 
 <?php 
require_once 'db_connect.php';


if(isset($_POST['update']))
{
    $book_id = $_POST['book_id'];

    $name = $_POST['name'];
    $pubyear = $_POST['pubyear'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];

    $query = "UPDATE books SET name = '$name', 
        pubyear = '$pubyear',
        author = '$author',
        isbn = '$isbn' WHERE id = '$book_id'";
    
    $executed = $conn->query($query);

    if($executed)
    {
        echo '<script type="text/javascript">alert("Data Updated")</script>';
    }
    else
    {
        echo '<script type="text/javascript">alert("Data Not Updated")</script>';
    }

}   

if (isset($_POST['return']))
{
    header('location: admin_page.php');
}

?> 


