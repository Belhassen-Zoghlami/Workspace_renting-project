<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    die($_POST['name']);
}
else{
    print_r('other'.$_SERVER);
    die();
}
