<?php

include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>

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

    <?php echo "<center><h1> Welcome ".$_SESSION['username']." to Admin page </h1></center>" ?>

    <div id="right-form" class="form hide-form"  > 
                
        <form action="" method="post" >

        <center>

        <button type="submit" class="button" name="update_user_info" >Update Your Datails</button>
        <br>
        <button type="submit" class="button" name="add_book" >Add Book</button>
        <br>
        <button type="submit" class="button" name="search" >Browse Books</button>
        <br>
        <button type="submit" class="button" name="update_book_info" >Update Book Datails</button>
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

if (isset($_POST['add_book']))
{
    header('location: add_book.php');
}

if (isset($_POST['search']))
{
    header('location: search.php');
}

if (isset($_POST['update_book_info']))
{
    header('location: update_book_info.php');
}

if (isset($_POST['logout']))
{
    header('location: logout.php');
}


?>