<?php
session_start();
include './connect.php';
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $sql = "UPDATE `workspaces` SET `wrkspace_status`='reserved' WHERE `wrkspace_ref`=".$_POST['wrkspace_id'];
    mysqlquery($sql);
    $sql = " INSERT INTO `reservations` (`wrkspace_id`, `user_id`, `reserv_start`, `reserv_end`) VALUES ('".$_POST['wrkspace_id']."','". $_SESSION['userid']."','".$_POST['start_time']."','".$_POST['end_time']."')";
    mysqlquery($sql);
    // sleep(1);
    header('location: ./browse.php');
}