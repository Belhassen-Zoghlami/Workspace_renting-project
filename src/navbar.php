<!-- 
    create a session when logged in
-->
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../style/styles.css">
        <link href="../style/output.css" rel="stylesheet">
        <title>Worki-N</title>


        <script defer src="../js/ScSn-scripts.js"></script>
    </head>

    <body class=" h-screen nunito-200"></body>
<nav class="navybar">
            <ul class="NavList nv smallbar nunito-200 hidenv">
                <li class="sidenavs"><a href="index.php">Home</a></li>
                <li class="sidenavs"><a href="browse.php">Browse</a></li>
                <li >
                    <h1 ><a class="logo major-regular" id="logosm" href="index.php#top">Worki-n</a></h1>
                </li>  
                <?php 
                    if (isset($_SESSION['useruid']))
                    {
                        if( isset($_SESSION['prio']) && ($_SESSION['prio']==='isAdminPrivMDM')  )
                        {
                            echo "<li class=\"sidenavs\"><a href=\"Admin.php\">Account</a></li>";
                            echo "<li class=\"sidenavs\"><a href=\"Logout.php\">Log out</a></li>";
        
                        }
                        else
                        {
                            echo "<li class=\"sidenavs\"><a href=\"Account.php\">Account</a></li>";
                            echo "<li class=\"sidenavs\"><a href=\"Logout.php\">Log out</a></li>";
                        }
                    }
                    else
                    {
                        echo "<li class=\"sidenavs\"><a href=\"Login.php\">Log in</a></li>";
                        echo "<li class=\"sidenavs\"><a href=\"Signup.php\">Sign in</a></li>";

                    }
                ?>
            </ul>


            <ul class="NavList nv xpandbar nunito-200 hidenv">
            <li >
                    <h1 ><a id='logoxp' class="logo major-regular" href="#">Worki-n</a></h1>
                </li>  
                <li ><a href="index.php">Home</a></li>
                <li ><a href="browse.php">Browse</a></li>
                
                <?php 
                    if (isset($_SESSION['useruid']))
                    {
                        if( isset($_SESSION['prio']) && ($_SESSION['prio']==='isAdminPrivMDM')  )
                        {
                            echo "<li><a href=\"Admin.php\">Account</a></li>";
                            echo "<li><a href=\"Logout.php\">Log out</a></li>";

                        }
                        else
                        {
                            echo "<li><a href=\"Account.php\">Account</a></li>";
                            echo "<li><a href=\"Logout.php\">Log out</a></li>";
                        }
                    }
                    else
                    {
                        echo "<li><a href=\"Login.php\">Log in</a></li>";
                        echo "<li><a href=\"Signup.php\">Sign in</a></li>";

                    }
                ?>
            </ul>
        </nav>