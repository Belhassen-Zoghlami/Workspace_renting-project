<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
if (isset($_SESSION['useruid']))
{
    if( isset($_SESSION['prio']) && ($_SESSION['prio']==='isAdminPrivMDM') )
    {
        header('location: ./Admin.php');
    }
    else
    {
        header('location: ./Account.php');
    }
}

?>

        <section class="second-home-content hidenav-height">
        <div class="home-content log reg-log bg-black/55 h-screen ">
            <main class="R-L-content NavList"> <!--flex justify-center items-center text-[4vw]--> 
                    <form  action="logSignVerf.php" method="POST">
                        
                        <label for="surname">User name: </label>
                        <input type="text" id="usrname" name="username" required>
                        
                        <label for="pswd">Password: </label>

                        <input type="password" id="pswdlog" name="pswd" required>
                        <p onclick="console.log('clicked')">forgot password?</p>
                        <box-icon id="showlog" name='show' color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex;"></box-icon>
                        <input type="submit" id="sub" name="Signlog" value="Log-in" >
                        <p>Dont have an account?</p>
                    </form>
                    <a href="Signup.php"><button id="goToSignin">Sign-up</button></a>
            </main>
        </div>
    </section>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script src="../js/Scripts.js"></script>
        <script src="../js/passViz.js"></script>
    </body>
</html>