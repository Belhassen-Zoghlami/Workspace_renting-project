<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">

<main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
    <div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">

        <h1 class="text-5xl">
            Add content:
        </h1>
        <span>

            <input type="number" id="numberofadds" default='1' min="1" max="10" placeholder="0" onchange="formrepea();">
        </span>
        <div>
            <script>
                    function deleteForm(el)
                    {
                        const formToDel = document.getElementById(el);
                        formToDel.innerHTML='<br>form deleted<br>';
                    }
                    function DeleteAllForms()
                    {
                        document.getElementById("uploadsec").innerHTML='';
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
                </script>
        <form id='add-form-container' action="AdminManagement.php" method="POST" enctype="multipart/form-data" accept="image/*">
            <div id="uploadsec">

            </div>

            <input class="submitForm" type="submit">

        </form>
        </div>
    </div>
</main>
</div>
<script src="../js/AdminAdd.js"></script>
