<?php

include_once 'session.php';
require_once 'db_connect.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>issue book</title>
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

    <center><h1>issue book</h1></center>

    <div id="right-form" class="form hide-form"> 
            
        <form action="" method="post">
            <input type="text" name="book_id" class="input-box" placeholder="book_id">
            <input type="text" name="issue_date" class="input-box" placeholder="issue_date">
            <input type="text" name="return_date" class="inpu-box" placeholder="return_date">

            <button type="submit" class="button" name="issue" >issue</button>
            <button type="submit" class="button" name="return" action="" >return to your page</button>
            
        </form>
        
    </div>

</body>
</html>


<?php

require_once 'db_connect.php';


if (isset($_POST['issue']))
{
    $student_id = $_SESSION['id'];
    $book_id = $_POST['book_id'];    
    $issue_date = $_POST['issue_date'];	
    $return_date = $_POST['return_date'];

    try
    {    
        $SQLInsert = "INSERT INTO issue_books(student_id, book_id, issue_date,return_date )
                                    VALUES( :student_id, :book_id, :issue_date, :return_date) "; 
    
        $statement = $conn->prepare($SQLInsert);
        $statement->execute(array(
        ':student_id' => $student_id, 
        ':book_id' => $book_id,    
        ':issue_date' => $issue_date,
        ':return_date' => $return_date      ));
        
        if($statement->rowCount() == 1)
        {
            echo '<script type="text/javascript">alert("Data Updated")</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("Data Not Updated")</script>';
        }
    }
    
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }

}

if (isset($_POST['return']))
{
    header('location: student_page.php');
}


?>

