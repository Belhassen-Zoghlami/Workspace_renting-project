<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
?>

        <section class="second-home-content hidenav-height">
        <div class="home-content reg-log bg-black/55 h-screen ">
            <main class="R-L-content NavList"> <!--flex justify-center items-center text-[4vw]--> 
                    <form  action="logSignVerf.php" method="POST">
                        
                        <label for="surname">User name: </label>
                        <input type="text" id="usrname" name="username" required>
                        
                        <label for="pswd">Password: </label>
                        <input type="password" id="pswdlog" name="pswd" required>
                        
                        <input type="submit" id="sub" name="Signlog" value="Log-in" >
                        <p>Dont have an account?</p>
                    </form>
                    <a href="Signup.php"><button id="goToSignin">Sign-up</button></a>
            </main>
        </div>
    </section>
        <script src="../js/Scripts.js"></script>
        <script src="../js/formval.js"></script>
    </body>
</html>