<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
include('./connect.php');

print_r($_POST);
$sql = "SELECT `password` FROM `users` WHERE (`user_id`=".$_POST['ref']." AND `password`=MD5('".$_POST['curr_password']."') )";
$res=mysqlquery($sql);
if(mysqli_num_rows($res)>0)
{
    if($_POST['password'] == $_POST['confirm_password'])
    {
        $sql = "UPDATE `users` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`password`=MD5('".$_POST['password']."') WHERE (`user_id`=".$_POST['ref']." AND `password`=MD5('".$_POST['curr_password']."') )";
        $res=mysqlquery($sql);
        echo "<script>alert('updated Successfully!');window.location.href='./Account.php'</script>";
        exit();
    }

}
else
{
    echo "<script>alert('incorrect password!');window.location.href='./Account.php'</script>";
exit();

}