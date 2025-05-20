
<?php
include './connect.php';
if (!empty($_POST) && ($_SERVER['REQUEST_METHOD'])=='POST'):
                        $sql="DELETE FROM reservations WHERE `reservations`.`reserv_ref` = ".substr($_POST['remove'], 11);
                        mysqlquery($sql); 
                        header('location: ./Admin.php?manage=display');
                    endif;
                    ?>