function removeNavheight()
{

    let AdXcomputedStyle ;
    let  AdXdisplay ;
    const navy =document.getElementsByClassName('navybar')[0]; //gets the nav bar by class name
    const hero =document.getElementsByClassName('hidenav-height')[0]; // gets needed div by its class name
    const nonstickBar =document.getElementsByClassName('ct')[0]; // gets needed div by its class name
    const form =document.getElementsByClassName('R-L-content')[0]; // gets needed div by its class name
    const reg =document.getElementsByClassName('reg')[0]; // gets needed div by its class name
    const log =document.getElementsByClassName('log')[0]; // gets needed div by its class name
    const xpand =document.getElementsByClassName('xpandbar')[0]; // gets needed div by its class name
    const sbar =document.getElementsByClassName('smallbar')[0]; // gets needed div by its class name
    const Adxpand =document.getElementsByClassName('Admin-xpandbar')[0]; // gets needed div by its class name
    const browse =document.getElementsByClassName('f-browse'); // gets needed div by its class name
    const adminsbar =document.getElementsByClassName('Admin-smallbar')[0]; //gets the nav bar by class name
    const adminbar =document.getElementsByClassName('Adminbar')[0]; //gets the nav bar by class name

    const computedStyle = window.getComputedStyle(navy); // gets all styles for the nav bar 
    const XcomputedStyle = window.getComputedStyle(xpand); // gets all styles for the nav bar 
    if(Adxpand)
    {
        AdXcomputedStyle = window.getComputedStyle(Adxpand); // gets all styles for the nav bar 
        AdXdisplay = AdXcomputedStyle.getPropertyValue('display'); // gets the value for the height property
    }

    const navHeight = +computedStyle.getPropertyValue('height').slice(0,-2)+ +window.getComputedStyle(sbar).getPropertyValue('margin-bottom').slice(0,-2) // gets the value for the height property
    const Xdisplay = XcomputedStyle.getPropertyValue('display'); // gets the value for the height property
    
    const adminbarheight = !adminsbar?0: +window.getComputedStyle(adminbar).getPropertyValue('height').slice(0,-2);
    const adminHmargin=+navHeight + +adminbarheight;

    hero && hero.style.setProperty('margin-top','-'+eval(adminHmargin)+'px'); //offsets the div by the height of the nav bar        
    if(browse)
    {
        for (let i=0;i<browse.length;i++)
        {
            Xdisplay === 'none' && browse[i].style.setProperty('padding-top',eval(navHeight*2)+'px'); //offsets the div by the height of the nav bar        
        }

    }
        if(reg && Xdisplay === 'none')
            {
                reg.style.setProperty('padding-top',eval(navHeight)+'px');
                reg.style.setProperty('padding-bottom',eval(navHeight)+'px');
            }
        if(log && Xdisplay === 'none') 
            {
                log.style.setProperty('padding-top',eval(navHeight)+'px');
                log.style.setProperty('padding-bottom',eval(navHeight)+'px');
            }
        nonstickBar && form && Xdisplay === 'none' && form.style.setProperty('margin-top',eval((adminHmargin)*0.5)+'px') ;
        if(adminsbar && AdXdisplay && nonstickBar && AdXdisplay =='none' )
            {
                nonstickBar.style.setProperty('padding-top',eval(adminHmargin*1.3)+'px');

            }
}

removeNavheight();
window.addEventListener('resize',removeNavheight,true);

window.onload = () => 
{
    
    window.dispatchEvent(new Event('resize'));// simulates window resize
};

function navbarDisplay()
{
    const Adsmallnav = document.getElementsByClassName('Admin-smallbar')[0];
    const smallnav = document.getElementsByClassName('smallbar')[0];
    const xnav = document.getElementsByClassName('xpandbar')[0];
    const Adxnav = document.getElementsByClassName('Admin-xpandbar')[0];
    
    const logosm = document.getElementById('logosm');
    const logoxp = document.getElementById('logoxp');

    const downarrow = document.getElementById('down-arrow');
    const uparrow = document.getElementById('up-arrow');

    let clickable=false;

function xpAdmin()
{
    if(clickable)
        {
            smNavLogo();
            Adsmallnav && Adsmallnav.classList.add('displaynone');
            Adxnav && Adxnav.classList.remove('displaynone');
            removeNavheight();

        }
}

function smAdmin()
{
    if(clickable)
    {
        Adxnav && Adxnav.classList.add('displaynone');
        Adsmallnav && Adsmallnav.classList.remove('displaynone');
        removeNavheight();

    }
}
    function xpNavLogo(){
        if(clickable)
        {
            smAdmin()
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



    window.addEventListener('resize',function()
    {

        if(window.innerWidth <1100)
        {
            clickable=true;
            Adxnav && Adxnav.classList.add('displaynone');
            xnav.classList.add('displaynone');

            logosm.setAttribute('href','#');
            if(Adsmallnav)
                {
                    downarrow.classList.remove('displaynone');
                    Adsmallnav.style.setProperty('grid-template-columns','repeat(1,1fr)')
                }

            downarrow && downarrow.classList.remove('displaynone');
            downarrow && downarrow.addEventListener('click',xpAdmin);
            uparrow && uparrow.addEventListener('click',smAdmin);

            logosm.addEventListener('click',xpNavLogo);
            logoxp.addEventListener('click',smNavLogo);
        }
        else
        {
            clickable=false;
            logosm.setAttribute('href','index.php#top');
            if(Adsmallnav)
                {
                    downarrow && downarrow.classList.add('displaynone');
                    Adsmallnav.style.setProperty('grid-template-columns','repeat(4,1fr)')
                }
            
            Adsmallnav && Adsmallnav.classList.remove('displaynone');
            smallnav.classList.remove('displaynone');
            Adxnav && Adxnav.classList.add('displaynone');
            xnav.classList.add('displaynone');
            downarrow && downarrow.classList.add('displaynone');
            
        }
        removeNavheight()
    },true);
}

navbarDisplay();
window.addEventListener("resize",navbarDisplay,true);