
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
<script> document.getElementsByClassName('navybar')[0].classList.add('adminpage')</script>



<nav class="Adminbar">
    <ul class="adminNav Admin-smallbar">
        <li id="down-arrow"><box-icon name="menu" color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex; justify-self:center;">Expand</box-icon></li>
        <li onmouseover="removeNavheight()">Add workspace</li>
        <li>Remove workspace</li>
        <li>Update workspace</li>
        <li>Display Reservation</li>
    </ul>
    <ul class="adminNav Admin-xpandbar hidenv">
        <li id="up-arrow"><box-icon name="x" color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex; justify-self:center;"></box-icon></li>
        <li>Add workspace</li>
        <li>Remove workspace</li>
        <li>Update workspace</li>
        <li>Display Reservation</li>
    </ul>
</nav>

<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">

    <main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
        <div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">

            <h1 class="text-5xl">
                browse content management:
            </h1>
            <span>
                <input type="number" id="numberofadds" default="1" min="1" max="10" placeholder="0" onchange="formrepea();">
            </span>

            <div class="NavList" id="pagination" style="margin-top:1rem;"></div>

            <form id='add-form-container' action="AdminManagement.php" method="POST" enctype="multipart/form-data" accept="image/*">
                <div id="uploadsec">

                </div>

                <input class="submitForm" type="submit">

            </form>
        </div>
    </main>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="../js/Scripts.js"></script>
<script src="../js/AdminAdd.js"></script>
</body>
</html>
