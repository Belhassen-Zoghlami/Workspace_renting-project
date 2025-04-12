<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/styles.css">
        <title>Js PHP Project</title>
        <script defer src="scripts.js"></script>
    </head>
    <body>
    <header class="bg-[url(./images/hero-op2.jpg)]  bg-cover bg-bottom h-screen">
        <!-- brightness-70 -->

            <nav >
                <ul class="NavList text-2xl text-white bg-black/10 nunito-200 backdrop-blur-sm shadow-2xl shadow-stone-800 ring rounded text-shadow-lg/40 bg-linear-to-br to-stone-400 hidenv">
                    <li class="sidenavs"><a href="">Home</a></li>
                    <li class="sidenavs"><a href="">Browse</a></li>
                    <li class="logo">
                        <h1 class="text-7xl major-regular" ><a href="">Reservi</a></h1>
                    </li>  
                        <!--
                            !<figure out tailwind intellisense or do it the ooga booga way ig>!
                                -tint the header background image
                                -create a logo: reservi + some pun about a class/workspace idfk
                                -blur effect on the navbar to make the elements visible
                                -js animations for the landing page
                                
                                -->                        
                            <li class="sidenavs"><a href="">Account</a></li>
                            <li class="sidenavs"><a href="">Sign out</a></li>
                        </ul>
                    </nav>


    </header>
    <main class="text-white h-screen bg-black center bg-[url(./images/hero-op1.jpg)]">
        <section class="bg-black/50 h-screen">

            <h2 class="hidenh">
                this is Worki.
            </h2>
        </section>
    </main>
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