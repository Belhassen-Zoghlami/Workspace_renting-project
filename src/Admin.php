
<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
if(!isset($_SESSION['prio']) || !($_SESSION['prio']==='isAdminPrivMDM') )
{
    header("location: ./index.php");
    exit();
}
include 'connect.php';
if(!isset($_GET['manage']))
{
    $_GET['manage']=' ';
}
?>
<script> document.getElementsByClassName('navybar')[0].classList.add('adminpage')</script>



<nav class="Adminbar">
    <ul class="adminNav Admin-smallbar">
        <li id="down-arrow"><box-icon name="menu" color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex; justify-self:center;">Expand</box-icon></li>
        <a href="?manage=add"><li>Add workspace</li></a>
        <a href="?manage=remove"><li>Remove workspace</li></a>
        <a href="?manage=update"><li>Update workspace</li></a>
        <a href="?manage=display"><li>Display Reservation</li></a>
    </ul>
    <ul class="displaynone adminNav Admin-xpandbar hidenv">
        <li id="up-arrow"><box-icon name="x" color="white" size="lg" style="width: 4rem; height: 4rem; display: inline-flex; justify-self:center;"></box-icon></li>
        <a href="?manage=add"><li>Add workspace</li></a>
        <a href="?manage=remove"><li>Remove workspace</li></a>
        <a href="?manage=update"><li>Update workspace</li></a>
        <a href="?manage=display"><li>Display Reservation</li></a>
    </ul>
</nav>
<?php
  function AdminManagement() {
    switch($_GET['manage'])
    {
        case 'add':
            include './AdminAdd.php'; 
            break;
        case 'update':
            include './AdminUPD.php';
            break;
        case 'remove':
            include './AdminRem.php';
            break;
        case 'display':
            include './ReservationDisplay.php';
            break;
        default:
            ?>
            <div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">
                <main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
                    <div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">
                        <h1 class="text-5xl">
                            browse content management:
                        </h1>
                    </div>
                </main>
            </div>
        <?php
            break;
    }
  }

  if (isset($_GET['manage'])) {
    AdminManagement();
  }
?>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="../js/Scripts.js"></script>
</body>
</html>
