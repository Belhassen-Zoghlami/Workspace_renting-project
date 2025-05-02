<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');

?>

        <section class="first-home-content hidenav-height ct">
        <div class="home-content reg reg-log bg-black/55 h-100">
            <main class="R-L-content NavList"> <!--flex justify-center items-center text-[4vw]--> 
                    <form  action="logSignVerf.php" method="POST">
                        <label for="name">First Name: </label>
                        <input type="text" id="name" name="name" required>
                        
                        <label for="surname">Last Name: </label>
                        <input type="text" id="surname" name="surname" required>

                        <label for="surname">User name: </label>
                        <input type="text" id="username" name="username" required>
                        
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" required>
                        
                        <label for="pswd">Password: </label>
                        <input type="password" id="pswd" name="pswd" required>
                        
                        <label for="confpswd">Confirm Password: </label>
                        <input type="password" id="confpswd" name="confpswd" required>
                        <box-icon id="showsign" name='show' color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex;"></box-icon>
                        
                        <input type="submit" id="sub" name="Signlog" value="Sign-Up" >
                        <p>Have an account already?</p>
                        <!-- <input type="submit" id="goToLogin" name="Signlog" value="Log-in"> -->
                    </form>
                    <a  href="Login.php"><button id="goToLogin">Log-in</button></a>
            </main>
        </div>
    </section>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="../js/Scripts.js"></script>
    <script src="../js/passViz.js"></script>
    <script src="../js/formval.js"></script>
    </body>
</html>