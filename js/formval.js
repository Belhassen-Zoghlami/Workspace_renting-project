

const fname = document.getElementById('name');
const lname = document.getElementById('surname');
const uname = document.getElementById('username');
const email = document.getElementById('email');
const pswd = document.getElementById('pswd');

const confpswd = document.getElementById('confpswd');

function validateName(name)
{
    return name.match
    (
        /^[a-z]+$/i
    );
}

function validateUsername(name)
{
    return name.match
    (
        /^([a-z]+(\_)?[a-z]+)+$/i
    );
}

function validateEmail(email){
    return email.match
    (
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

function validatePasswrd(pswd)
{
    return pswd.match
    (
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[!-~]{6,}$/
    )
}

function confirmPasswrd(pswd,confpswd)
{
    return pswd.value===confpswd.value;
}


function inputFeedBack(elem,valfunction,minLen,maxLen)
{
    elem.addEventListener("change", () =>
        {
        const color = minLen<=elem.value.length<=maxLen?valfunction(elem.value)?"green":"red":"red";
        elem.style.setProperty('color',color);
    })
}
// function showPass(pswd)
// {
//     pswd.setAttribute('type','text');
// }


inputFeedBack(fname,validateName,3,25);
inputFeedBack(lname,validateName,3,25);
inputFeedBack(uname,validateUsername,3,25);
inputFeedBack(email,validateEmail,10,30);
inputFeedBack(pswd,validatePasswrd,6,30);

if (confpswd)
{
    confpswd.addEventListener("change", () =>
    {
        const color = confirmPasswrd(pswd,confpswd)?"green":"red";
        confpswd.style.setProperty('color',color);
    });
}
