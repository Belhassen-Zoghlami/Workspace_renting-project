<?php

$db_user = 'root';
$db_pass = '';
$db_name = 'study_hub';
// global $conn;
$conn = '';

// $db = new mysqli('localhost', $user, $pass, $db) or die("failed to connect to database");
try
{
    $conn = mysqli_connect('localhost',$db_user,$db_pass,$db_name);
}
catch(mysqli_sql_exception)
{
    echo "Could not connect!";
}

if ($conn)
{
    echo"connection established!";
    function mysqlquery($query)
    {
        global $conn;
        return mysqli_query($conn,$query);
    }
}

