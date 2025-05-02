function removeNavheight()
{
const navy =document.getElementsByClassName('navybar')[0]; //gets the nav bar by class name
const hero =document.getElementsByClassName('hidenav-height')[0]; // gets needed div by its class name
const nonstickBar =document.getElementsByClassName('ct')[0]; // gets needed div by its class name
const form =document.getElementsByClassName('R-L-content')[0]; // gets needed div by its class name
const reg =document.getElementsByClassName('reg')[0]; // gets needed div by its class name
const xpand =document.getElementsByClassName('xpandbar')[0]; // gets needed div by its class name
const browse =document.getElementsByClassName('f-browse'); // gets needed div by its class name
const adminbar =document.getElementsByClassName('adminNav')[0]; //gets the nav bar by class name

const computedStyle = window.getComputedStyle(navy); // gets all styles for the nav bar 
const XcomputedStyle = window.getComputedStyle(xpand); // gets all styles for the nav bar 

const navHeight = computedStyle.getPropertyValue('height').slice(0,-2); // gets the value for the height property
const Xdisplay = XcomputedStyle.getPropertyValue('display'); // gets the value for the height property

const adminbarheight = !adminbar?0: +window.getComputedStyle(adminbar).getPropertyValue('height').slice(0,-2) + +window.getComputedStyle(adminbar).getPropertyValue('margin-top').slice(0,-2);
const adminHmargin=+navHeight + +adminbarheight;

hero && hero.style.setProperty('margin-top','-'+eval(adminHmargin)+'px'); //offsets the div by the height of the nav bar        
if(browse)
{
    for (let i=0;i<browse.length;i++)
    {
        Xdisplay === 'none' && browse[i].style.setProperty('padding-top',eval(navHeight*2)+'px'); //offsets the div by the height of the nav bar        
    }

}
    reg && Xdisplay === 'none' && reg.style.setProperty('padding-top',eval(navHeight*4)+'px'); //adds padding at the top of the form to avoid collision with nav
    nonstickBar && form && Xdisplay === 'none' && form.style.setProperty('margin-top',eval((adminHmargin)*2)+'px') ;
    adminbar && nonstickBar && nonstickBar.style.setProperty('padding-top',eval(adminHmargin)+'px');
}

removeNavheight();
window.addEventListener('resize',removeNavheight,true);

window.onload = () => 
{
    
    window.dispatchEvent(new Event('resize'));// simulates window resize
};

function navbarDisplay()
{
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
    window.addEventListener('resize',function()
    {

        if(window.innerWidth <1100)
        {
            clickable=true;
            xnav.classList.add('displaynone');

            logosm.setAttribute('href','#');

            logosm.addEventListener('click',xpNavLogo);
            logoxp.addEventListener('click',smNavLogo);
        }
        else
        {
            clickable=false;
            logosm.setAttribute('href','index.php#top');
            xnav.classList.add('displaynone');
            smallnav.classList.remove('displaynone');
            
        }
        removeNavheight()
    },true);
}

navbarDisplay();
window.addEventListener("resize",navbarDisplay,true);