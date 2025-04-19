<?php

$db_user = 'DB USER';
$db_pass = 'PASSWORD';
$db_name = 'DB NAME';
// global $conn;
$conn = '';

// $db = new mysqli('localhost', $user, $pass, $db) or die("failed to connect to database");
try
{
    $conn = mysqli_connect('SERVER NAME',$db_user,$db_pass,$db_name);
}
catch(mysqli_sql_exception)
{
    echo "Could not connect!";
}

if ($conn)
{
    function mysqlquery($query)
    {
        global $conn;
        return mysqli_query($conn,$query);
    }
}

