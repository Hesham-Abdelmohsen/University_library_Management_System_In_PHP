<?php

include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add book</title>
    <link rel="stylesheet" href="../main_page/main_page.css">

    <style type="text/css">


        form
        {
            height:100%;
            align:center;
            width:600px;

            margin-left:800px;
            margin-top:-300px;
        }

    </style>

</head>

<body>

    <center><h1>add book here</h1></center>

    <div id="right-form" class="form hide-form"> 
                
        <form action="" method="post">
            <input type="text" name="name" class="input-box" placeholder="book name">
            <input type="text" name="pubyear" class="inpu-box" placeholder="publication year">
            <input type="text" name="author" class="input-box" placeholder="author name">
            <input type="text" name="isbn" class="input-box" placeholder="ISBN">            
            <button type="submit" class="button" name="add-button" >Add to library</button>
            <button type="submit" class="button" name="return" action="" >return to your page</button>
        </form>

    </div>


</body>

</html>


<?php

require_once 'db_connect.php';


if (isset($_POST['add-button']))
{
    $name = $_POST['name'];

    $pubyear = $_POST['pubyear'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    
    try
    {    
        $SQLInsert = "INSERT INTO books(name, pubyear, author, isbn, to_date)
                       VALUES( :name, :pubyear, :author, :isbn, now()) ";
    
        $statement = $conn->prepare($SQLInsert);
        $statement->execute(array(
        ':name' => $name, 
        ':pubyear' => $pubyear,
        ':author' => $author,
        ':isbn' => $isbn ));
    
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
    header('location: admin_page.php');
}


?>

