<?php
session_start();
include './connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $current=date('Y-m-d H:m:s',time());
    if ($current>$_POST['end_time'])
    {
    $sql = "UPDATE `workspaces` SET `wrkspace_status`= 'open' WHERE `wrkspace_ref`=".$_POST['wrkspace_id'];
    $res=mysqlquery($sql);
    header('location: ./browse.php');
    exit();
    }
    else
    {

        $sql = "UPDATE `workspaces` SET `wrkspace_status`='reserved' WHERE `wrkspace_ref`=".$_POST['wrkspace_id'];
        mysqlquery($sql);
        $sql = " INSERT INTO `reservations` (`wrkspace_id`, `user_id`, `reserv_start`, `reserv_end`) VALUES ('".$_POST['wrkspace_id']."','". $_SESSION['userid']."','".$_POST['start_time']."','".$_POST['end_time']."')";
        mysqlquery($sql);
        sleep(1);
        header('location: ./browse.php');
        exit();
    }
}
header('location: ./browse.php');
exit();