const showlog = document.getElementById('showlog');
const showsig = document.getElementById('showsign');
const Pswd = document.getElementById('pswd');
const pswdlog = document.getElementById('pswdlog');
const Confpswd = document.getElementById('confpswd');


    function showHidePass(elem,attrib,vision,name){
        elem.setAttribute('type',attrib);
        vision.setAttribute("name",name);
    }
    if(pswdlog)
    {
        showlog.addEventListener('click',()=>
        {
            pswdlog.getAttribute('type')==='password'?showHidePass(pswdlog,'text',showlog,'hide'):showHidePass(pswdlog,'password',showlog,'show');
        });
    }
    else if(Pswd && Confpswd)
    {
        showsig.addEventListener('click',()=>
        {
            Pswd.getAttribute('type')==='password'?showHidePass(Pswd,'text',showsig,'hide'):showHidePass(Pswd,'password',showsig,'show');
            Confpswd.getAttribute('type')==='password'?showHidePass(Confpswd,'text',showsig,'hide'):showHidePass(Confpswd,'password',showsig,'show');
        });

    }