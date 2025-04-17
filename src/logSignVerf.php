<?php 

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    include('./connect.php');
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
    return preg_match("/^([a-z]+(\_)?[a-z]+)+$/",$name);
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


// add tests on email and username to  make sure they are unique before adding to db
if($status)
{
       $sql="INSERT INTO `users` (`name`, `last_name`, `username`, `email`, `password`, `date-created`) VALUES ('$name', '$surname', '$username', '$Email',MD5('$pswd'), current_timestamp())";
       $query=mysqlquery($sql);
}

echo "<script> 
alert('$msg');
window.location.href='./Signup.php';
</script>";
}
else{
    header("location: ./index.php");
 }




?>