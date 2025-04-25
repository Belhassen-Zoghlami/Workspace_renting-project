
<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
if(!isset($_SESSION['prio']) || !($_SESSION['prio']==='isAdminPrivMDM') )
{
    header("location: ./index.php");
    exit();
}
include('connect.php');
?>

<main class="ct">
    <div class="added min-h-[fit-content] b-content text-black">
        
        <h1 class="text-5xl">
            browse content management:
        </h1>
        <span>

            <input type="number" id="numberofadds" default='1' min="1" max="10" onchange="formrepea()">
        </span>
        <div>
            <script>
                function formrepea()
                {
                    const addcontainer=document.getElementById('uploadsec');
                    const numberForms=document.getElementById('numberofadds').value;
                    let content='';
                    addcontainer.innerHTML=content;                
                    for(let i=0;i<numberForms;i++)
                    {
                        content+=
                        `
                        <br>
                        <label for="name${i}">Workspace Name:</label>      
                        <input type="text" name="name${i}">
                        <label for="name${i}">title:</label>      
                        <input type="text" name="title${i}">
                        <input type="text" name="desc${i}">
                        <input type="file" name="img${i}1">
                        <input type="file" name="img${i}2">
                        <input type="file" name="img${i}3">
                        <input type="file" name="img${i}4">
                        <select name="status${i}" id="wkStatus${i}">
                        <option value="open">open</option>
                        <option value="reserved">reserved</option>
                        </select>  
                        <br>      
                        <br>      
                        `
                    }
                    addcontainer.innerHTML+=content;                
            }
            </script>
        <form id='add-form-container' action="AdminManagement.php" method="POST">
            <div id="uploadsec">

            </div>

            <input type="submit">

        </form>
        </div>
    </div>
</main>


<script src="../js/Script"></script>
</body>
</html>
