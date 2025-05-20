<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
include('./connect.php');

            function EmailVal($email)
            {
                return filter_var($email, FILTER_VALIDATE_EMAIL);
            }

            function UserNameVal($name)
            {
                return preg_match("/^([a-z]+(\_)?[a-z]+)+$/i",$name);
            }

            function PswdVal($psw)
            {
                return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[!-~]{6,}$/",$psw);
            }

            function ConfirmPswd($pswd1,$pswd2)
            {
                return $pswd1===$pswd2;
            }

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST))
{
    $Email = htmlspecialchars($_POST["email"]); 
    $username=htmlspecialchars($_POST["username"]); //only contains letters and underscores
    $pswd=htmlspecialchars($_POST["password"]); // at least 6 characters, 1 caps 1 number 1 lowercase
    $confpswd=htmlspecialchars($_POST["confirm_password"]);//matches  pswd
    $currpswd=htmlspecialchars($_POST["curr_password"]);//matches  pswd
    $usid=htmlspecialchars($_POST["ref"]);//matches  pswd
            if(empty($Email) || empty($username) )
            {
                header("location: ./Account.php");
                exit();
            }

    // print_r($_POST);


    $status=false;// tests validation status init
            $msg='Connection to Database failed.\n try again later';
            if($conn)
            {
               if (!UserNameVal($username))
                {
                    $msg =$username.' format is not valid!\nTry a different username';
                }
                elseif (!EmailVal($Email))
                {
                    $msg =$Email.' format is not valid!\nTry a different Email';
                }
                elseif (!PswdVal($pswd))
                {
                    $msg ='Password format is not valid!\nTry a different Password';
                }
                elseif(!ConfirmPswd($pswd,$confpswd))
                {
                    $msg ='Password confirmation failed!\nboth Passwords must match';
                }
                else
                {
                    $msg ='All Formats were correct!\nSending...';
                    $status=true;
                }

                if($status){
                    
                    $sql = "SELECT `password` FROM `users` WHERE (`user_id`=".$usid." AND `password`=MD5('".$currpswd."') )";
                    $res=mysqlquery($sql);
                    if(mysqli_num_rows($res)>0)
                    {
                        if(!empty($pswd))
                        {
                            
                            if($pswd == $confpswd)
                            {
                                $sql = "UPDATE `users` SET `username`='".$username."',`email`='".$Email."',`password`=MD5('".$pswd."') WHERE (`user_id`=".$usid." AND `password`=MD5('".$currpswd."') )";
                                $res=mysqlquery($sql);
                                echo "<script>alert('updated Successfully!');window.location.href='./Account.php'</script>";
                                exit();
                            }
                        }
                        else
                        {
                            
                            $sql = "UPDATE `users` SET `username`='".$username."',`email`='".$Email."' WHERE (`user_id`=".$usid." AND `password`=MD5('".$currpswd."') )";
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
                }
                            echo "<script> 
                alert('$msg');
                window.location.href='./Login.php';
                </script>";
                header("location: ./Login.php");
                exit();
            }
            else
            {
                echo "<script> 
                alert('$msg');
                window.location.href='./Signup.php';
                </script>";
                header("location: ./Signup.php");
                exit();

            }
}
header('location: ./Account.php');
exit();