<?php
if ($_SERVER['REQUEST_METHOD']==='POST'){
    print_r($_POST);
    die();
}
else{
    print_r('other'.$_SERVER);
    die();
}
