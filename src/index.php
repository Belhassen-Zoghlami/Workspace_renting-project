                        <!--
                            !<figure out tailwind intellisense or do it the ooga booga way ig>!
                                -create a logo: reservi + some pun about a class/workspace idfk
                                -js animations for the landing page
                                
                                -->       


<!-- current obj xpandable bar for smaller screens -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Major+Mono+Display&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
        <link href="../style/output.css" rel="stylesheet">
        <link rel="stylesheet" href="../style/styles.css">
        <title>Worki-N</title>


        <script defer src="../scripts.js"></script>
    </head>

    <body class=" h-screen nunito-200">

        <nav class="navybar">
            <ul class="NavList smallbar nunito-200 hidenv">
                <li class="sidenavs"><a href="">Home</a></li>
                <li class="sidenavs"><a href="browse.php">Browse</a></li>
                <li >
                    <h1 ><a class="logo major-regular" id="logosm" href="top">Worki-n</a></h1>
                </li>  
                
                <li class="sidenavs"><a href="">Account</a></li>
                <li class="sidenavs"><a href="">Sign out</a></li>
            </ul>


            <ul class="NavList xpandbar nunito-200 hidenv">
            <li >
                    <h1 ><a id='logoxp' class="logo major-regular" href="#">Worki-n</a></h1>
                </li>  
                <li ><a href="">Home</a></li>
                <li ><a href="browse.php">Browse</a></li>
                
                <li ><a href="">Account</a></li>
                <li ><a href="">Sign out</a></li>
            </ul>
        </nav>



        
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
            <div class="text-white h-screen bg-black center bg-[url(../images/hero-op1.jpg)] bg-bottom snap-start"> 
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
        </div>

    <script>

        function removeNavheight(){    

            const navy =document.getElementsByClassName('navybar')[0]; //gets the nav bar by class name
            const hero =document.getElementsByClassName('hidenav-height')[0]; // gets needed div by its class name
            const computedStyle = window.getComputedStyle(navy); // gets all styles for the nav bar 
            const navHeight = computedStyle.getPropertyValue('height'); // gets the value for the height property
            hero.style.setProperty('margin-top','-'+navHeight); //offsets the div by the height of the nav bar
        }
        removeNavheight();
        window.addEventListener('resize',removeNavheight,true);

        window.onload = () => {
            
            window.dispatchEvent(new Event('resize'));// simulates window resize
        };
        // window.onresize = () => {
        //     window.dispatchEvent(new Event('resize'));
        // };
        
        function navbarDisplay(){
            // const windWidth = this.;
            const smallnav = document.getElementsByClassName('smallbar')[0];
            const xnav = document.getElementsByClassName('xpandbar')[0];
            const logosm = document.getElementById('logosm');
            const logoxp = document.getElementById('logoxp');
            let clickable=false;
            function xpNavLogo(){
                if(clickable)
                {

                    smallnav.classList.add('displaynone');
                    xnav.classList.remove('displaynone');
                    removeNavheight();
                }
                };

            function smNavLogo(){
                if(clickable===true)
                {
                    
                    xnav.classList.add('displaynone');
                    smallnav.classList.remove('displaynone');
                    removeNavheight();
                }
            }
            window.addEventListener('resize',function(){

                if(window.innerWidth <1100){
                    clickable=true;
                    xnav.classList.add('displaynone');
    
                    logosm.setAttribute('href','#');
    
                    logosm.addEventListener('click',xpNavLogo);
                    logoxp.addEventListener('click',smNavLogo);
                    // console.log(logo);
                }
                else
                {
                    clickable=false;
                    logosm.setAttribute('href','top');
                    xnav.classList.add('displaynone');
                    smallnav.classList.remove('displaynone');
                    
                }
                removeNavheight()
            },true);
        }

        navbarDisplay();
        window.addEventListener("resize",navbarDisplay,true);

    </script>
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