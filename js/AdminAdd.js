function deleteForm(el)
{
    const formToDel = document.getElementById(el);
    formToDel.innerHTML='<br>form deleted<br>';
    // document.getElementById("howmany").value-=1;
}
function DeleteAllForms()
{
    document.getElementById("uploadsec").innerHTML='';
    // document.getElementById("howmany").value=0;
    document.getElementById('numberofadds').innerHTML=0;
}
function formrepea()
{

const addcontainer=document.getElementById('uploadsec');
const numberForms=document.getElementById('numberofadds').value;
let content='';
addcontainer.innerHTML=content;
if(numberForms>0)
{
    content='<button class="del" type="button" name="delAll" onclick="DeleteAllForms()">Delete All</button>'
    // content+=`<input name="howmany" id="howmany" value="${numberForms}" hidden>`
}
for(let i=0;i<numberForms;i++)
{
    content+=
    `
    <div id='form${i}'>
    <br>
    <label for="name${i}">Workspace Name:</label>
    <input type="text" name="name${i}">
    <label for="title${i}">title:</label>
    <input type="text" name="title${i}">
    <label for="desc${i}">Description:</label>
    <input type="text" name="desc${i}">
    <input type="file" id="img${i}1"  class='image'name="img${i}1" onchange="getImages()">
    <input type="file" id="img${i}1"  class='image'name="img${i}2" onchange="getImages()">
    <input type="file" id="img${i}1"  class='image'name="img${i}3" onchange="getImages()">
    <input type="file" id="img${i}1"  class='image'name="img${i}4" onchange="getImages()">
    <select class="selectStatus" name="status${i}" id="wkStatus${i}">
    <option class="selectStatus" value="open">open</option>
    <option class="selectStatus" value="reserved">reserved</option>
    </select>
    <button type='button' id='m${i}' name='form${i}' class='del' onclick='deleteForm(this.name);'style='margin-top:3rem;'>Delete Workspace</button>
    <br>
    <br>
    </div>
    `
}

addcontainer.innerHTML+=content;
getImages();
}

function getImages()
{
const files = document.querySelectorAll('.image');
fileinput = function () {
    {
                color = this.value ? 'green':'red';
                this.style.setProperty('color',color);
                console.log(this.value);
            }
}
    if(files)
    {
        for (let i=0;i<files.length;i++)
        {
            
            files[i].addEventListener('change',fileinput,false);
        }
    }
}