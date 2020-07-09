<?php

include_once 'session.php';
require_once 'db_connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>return book</title>
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
</style>

</head>
<body>

    <center><h1>return book here</h1></center>
    <div id="right-form" class="form hide-form"> 
                
        <form action="" method="post">
            <input type="text" name="booking_id" class="input-box" placeholder="booking_id">
            
            <button type="submit" class="button" name="return" >return</button>

            <button type="submit" class="button" name="return_page" action="" >return to your page</button>
        </form>
    </div>

</body>
</html>

 
 <?php 


if(isset($_POST['return']))
{
    $booking_id = $_POST['booking_id'];

    $query = "UPDATE issue_books SET book_returned = 1              
        WHERE id = '$booking_id'";
    
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

if (isset($_POST['return_page']))
{
    header('location: student_page.php');
}

?> 


