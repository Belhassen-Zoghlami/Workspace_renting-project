
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
                        Welcome to Worki-n, your digital launchpad for discovering dynamic workspaces tailored to your flow
                            </h2>
                            <br><br>
                    <h2 class="hidenh hero2 text-shadow-lg/40">
                        Whether you're a solo hustler or a team force, this is your gateway to productive zones that match your energy.
                            </h2>
                </section>
            </div>
            <div class="second-home-content bg-[url(../images/hero-op3.webp)]"> 
                <section class="bg-black/50 h-screen snap-start body">

                    <h2 class="hidenv hero2 text-shadow-lg/40">
                        At Worki-n, we offer an expansive selection of work environments designed to inspire focus, innovation, and efficiency.
                            </h2>
                            <br><br>
                    <h2 class="hidenv hero2 text-shadow-lg/40">
                        From cozy desks to creative hubs, we’ve got the space — you bring the mission.,
                            </h2>
                </section>
            </div>
            <div class="second-home-content bg-[url(../images/hero-op4.webp)]"> 
                <section class="bg-black/50 h-screen snap-start body">

                    <h2 class="hidenh hero2 text-shadow-lg/40">
                        Our mission is simple: fuel your productivity while keeping your creativity alive. With intuitive features and seamless access, Worki-n empowers you to do your best work, wherever you are
                            </h2>
                            <br><br>
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





