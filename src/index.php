<!-- Account: LogIn
                when logged:\
                    show current reservations with cancel possiblity
                    sign-in become a Login possiblity
     -->

<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
?>


<div class="home-content hidenav-height" id="top">
            <div class=" first-home-content"> <!-- header background image-->
                    <header class="bg-black/55 h-screen "> <!-- background tint for the header image -->
                        <section class="body">
                            <h2 class="hidenh text-shadow-lg/40">
                                welcome to
                            </h2>
                            <h2 class="major-regular hidenh text-shadow-lg/70 logo">
                            Worki-n
                            </h2>
                        </section>
                    </header>
            </div>
            <div class="second-home-content"> 
                <section class="bg-black/50 h-screen snap-start body">

                    <h2 class="hidenh hero2 text-shadow-lg/40">
                                Where we offer a wide variety of workspaces for you to explore,
                            </h2>
                            <br><br>
                    <h2 class="hidenh hero2 text-shadow-lg/40">
                                aswell as ensure peak productivity and creativity.
                            </h2>
                </section>
            </div>
            <div class="second-home-content bg-[url(../images/hero-op3.webp)]"> 
                <section class="bg-black/50 h-screen snap-start body">

                    <h2 class="hidenv hero2 text-shadow-lg/40">
                                Where we offer a wide variety of workspaces for you to explore,
                            </h2>
                            <br><br>
                    <h2 class="hidenv hero2 text-shadow-lg/40">
                                aswell as ensure peak productivity and creativity.
                            </h2>
                </section>
            </div>
        </div>

    <script>
        const nav = document.getElementsByClassName('navybar')[0];
        nav.classList.add('sticky');
    </script>
    <script src="../js/Scripts.js"></script>
</body>
</html>





<!-- 
    eaach room has:
    -gallery: images
    -location
    -capacity
    -equipement
        -price/duration
        -availability:
            if booked-> show booked til when;
-->