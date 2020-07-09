<?php

$username = 'root';
$password = '';
$dsn = 'mysql:host=localhost:3325;charset=utf8; dbname=mydb' ;

try
{
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "fail to connect to the database".$e->getMessage();
}

?>