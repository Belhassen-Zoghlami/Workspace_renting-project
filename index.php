                        <!--
                            !<figure out tailwind intellisense or do it the ooga booga way ig>!
                                -create a logo: reservi + some pun about a class/workspace idfk
                                -js animations for the landing page
                                
                                -->       




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link href="./style/output.css" rel="stylesheet">
        <link rel="stylesheet" href="style/styles.css">
        <title>Worki</title>
        <script defer src="scripts.js"></script>
    </head>

    <body class="nunito-200">
        <nav>
            <ul class="NavList nunito-200 hidenv">
                <li class="sidenavs"><a href="">Home</a></li>
                <li class="sidenavs"><a href="">Browse</a></li>
                <li >
                    <h1 ><a class="logo major-regular" href="">Worki-n</a></h1>
                </li>  
                
                <li class="sidenavs"><a href="">Account</a></li>
                <li class="sidenavs"><a href="">Sign out</a></li>
            </ul>
        </nav>
        
        <div class="snap-y snap-mandatory overflow-scroll h-screen  heroo">
    <div class="bg-[url(../images/hero-op2.jpg)] bg-cover bg-bottom h-screen  snap-start "> <!-- header background image-->
            <header class="bg-black/30 h-screen "> <!-- background tint for the heaeder image -->
                <section class="thisis">
                    <h2 class="hidenh text-shadow-lg/40">
                        this is 
                    </h2>
                    <h2 class="major-regular hidenh text-shadow-lg/70 logo">
                    Worki-n
                    </h2>
                </section>
            </header>
    </div>
        <div class="text-white h-screen bg-black center bg-[url(../images/hero-op1.jpg)] bg-bottom snap-start"> 
            <section class="bg-black/50 h-screen snap-start thisis">

                <h2 class="hidenh hero2 text-shadow-lg/40">
                            We offer a wide variety of workspaces for you to explore
                        </h2>
                <h2 class="hidenh hero2 text-shadow-lg/40">
                            To ensure peak productivity and creativity.
                        </h2>
                </section>
                    </div>
                    </div>
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