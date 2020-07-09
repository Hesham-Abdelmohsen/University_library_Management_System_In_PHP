<?php

include_once 'session.php';
require_once 'db_connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modify return date</title>
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
    <center><h1>modify return book date here</h1></center>

    <div id="right-form" class="form hide-form"> 
        <form action="" method="post">
            <input type="text" name="booking_id" class="input-box" placeholder="booking_id">
            <input type="text" name="return_date" class="input-box" placeholder="your new return date">
            
            <button type="submit" class="button" name="modify" >modify</button>
            <button type="submit" class="button" name="return" action="" >return to your page</button>

        </form>
    </div>

</body>
</html>

 
 <?php 


if(isset($_POST['modify']))
{
    $booking_id = $_POST['booking_id'];
    $return_date = $_POST['return_date'];

    $query = "UPDATE issue_books SET return_date = '$return_date'              
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

if (isset($_POST['return']))
{
    header('location: student_page.php');
}


?> 


