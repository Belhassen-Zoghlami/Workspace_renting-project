<?php 

if ($_SERVER["REQUEST_METHOD"]==="POST")
{
    include('./connect.php');

    switch ($_POST['Signlog'])
    {
        case 'Sign-Up':
            $name=htmlspecialchars($_POST["name"]); //only contains letters
            $surname=htmlspecialchars($_POST["surname"]); //only contains letters
            $username=htmlspecialchars($_POST["username"]); //only contains letters and underscores
            $pswd=htmlspecialchars($_POST["pswd"]); // at least 6 characters, 1 caps 1 number 1 lowercase
            $confpswd=htmlspecialchars($_POST["confpswd"]);//matches  pswd
            $Email = htmlspecialchars($_POST["email"]); //verf done


            if(empty($Email) || empty($confpswd) || empty($pswd) || empty($username) || empty($surname) || empty($name))
            {
                header("location: ./Signup.php");
                exit();
            }

            //*********************************    validate functions     *******************************************
            function EmailVal($email)
            {
                return filter_var($email, FILTER_VALIDATE_EMAIL);
            }

            function NameVal($name)
            {
                return preg_match("/^[a-z]+$/i",$name);
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

            //*******************************************************************************************************
            $status=false;// tests validation status init
            $msg='Connection to Database failed.\n try again later';
            if($conn)
            {
                if (!NameVal($name))
                {
                    $msg =$name.' format is not valid!\nTry a different name';
                }
                elseif (!NameVal($surname))
                {
                    $msg =$surname.' format is not valid!\nTry a different surname';
                }
                elseif (!UserNameVal($username))
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


            //tests on email and username to  make sure they are unique


                $sql = "SELECT * FROM `users` WHERE username = '$username'";
                $query = mysqlquery($sql);
                if (mysqli_num_rows($query)>0)
                {
                    $status=false;
                    $msg = 'username: '.$username.' already exists!\nTry a different one';
                } 
                $sql = "SELECT * FROM `users` WHERE email = '$Email'";
                $query = mysqlquery($sql);
                if (mysqli_num_rows($query)>0)
                {
                    $status=false;
                    $msg = 'Email address: '.$Email.' already exists!\nTry a different one';
                } 
                
                
                
                if($status)
                {
                    $sql="INSERT INTO `users` (`name`, `last_name`, `username`, `email`, `password`, `date-created`) VALUES ('$name', '$surname', '$username', '$Email',MD5('$pswd'), current_timestamp())";
                    $query=mysqlquery($sql);
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
                break;

        case 'Log-in':
            $status=false;
            $username=htmlspecialchars($_POST["username"]); //only contains letters and underscores
            $pswd=htmlspecialchars($_POST["pswd"]); // at least 6 characters, 1 caps 1 number 1 lowercase
            if($conn)
            {

                $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = MD5('$pswd')";
                $query = mysqlquery($sql);
                
                mysqli_num_rows($query)>0 ? $status=true && $msg = "Connecting...": $msg = "Incorrect Credentials";
                
                if ($status)
                {
                    session_start();
                    $sql = "SELECT `user_id`,`user_prio` FROM `users` WHERE `username`='$username'";
                    // die($sql);
                    $result=mysqlquery($sql);
                    $rows=mysqli_fetch_row($result);
                    $id=$rows[0];
                    $prio=$rows[1];
                    $_SESSION['userid']=$id;
                    $_SESSION['useruid']=$username;
                    if($prio==='0')
                    {
                        $_SESSION['prio']='isAdminPrivMDM';
                        echo "<script> 
                        alert('Welcome admin: $username');
                        window.location.href='./Admin.php';
                        </script>";
                        header("location: ./Admin.php");
                        exit();
                    }
                    elseif ($prio==='2')
                    {
                        echo "<script> 
                        alert('$msg');
                        window.location.href='./index.php';
                        </script>";
                        header("location: ./index.php");
                        exit();
                    }
                    else
                    {
                        die('tests failed');
                    }
                }
                else
                {
                    echo "<script> 
                    alert('$msg');
                    window.location.href='./Login.php';
                    </script>";
                    header("location: ./Login.php");
                    exit();
                }
            }
            else
            {
                // die('hereeeeeeeeee');
                echo "<script> 
                alert('Connection to Database failed. try again later');
                window.location.href='./Login.php';
                </script>";
                exit();
            }
                 break;
    }
}
else{
    header("location: ./index.php");
 }
 header("location: ./index.php");
 exit();



