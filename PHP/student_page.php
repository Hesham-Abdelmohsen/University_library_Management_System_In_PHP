<?php

include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student page</title>
    <link rel="stylesheet" href="../main_page/main_page.css">

    <style type="text/css">

        form
        {
            height:100%;
            align:center;
            width:600px;

            margin-left:700px;
            margin-top:-300px;
        }

        form button
        {
            width:100%;
            height:40px;
            align:center;
            margin:500px ;
            
        }

    </style>

</head>
<body>

    <?php if(!isset($_SESSION['username'])): header("location: logout.php"); ?>

    <?php else: ?>

    <?php endif ?>

    <?php echo "<center><h1> Welcome ".$_SESSION['username']." to Student page </h1></center>" ?>

    <div id="right-form" class="form hide-form"  > 
        
        <form action="" method="post" >
    
            <center>
    
            <button type="submit" class="button" name="update_user_info" >Update Your Details</button><br>

            <button type="submit" class="button" name="search" >Browse Books</button><br>
            <button type="submit" class="button" name="issue_book" >Issue Book</button><br>
            <button type="submit" class="button" name="return_book" >Return Book</button><br>
            <button type="submit" class="button" name="modify_return_date" >Modify Return Date</button>
            <br>
            <button type="submit" class="button" name="logout" >logout</button>    

            </center>
    
        </form>

    </div>
        

</body>
</html>

<?php

if (isset($_POST['update_user_info']))
{
    header('location: update_user_info.php');
}

if (isset($_POST['search']))
{
    header('location: search.php');
}

if (isset($_POST['issue_book']))
{
    header('location: issue_book.php');
}

if (isset($_POST['return_book']))
{
    header('location: return_book.php');
}

if (isset($_POST['modify_return_date']))
{
    header('location: modify_return_date.php');
}

if (isset($_POST['logout']))
{
    header('location: logout.php');
}


?>