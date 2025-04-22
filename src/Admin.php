
<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
if(!isset($_SESSION['prio']) || !($_SESSION['prio']==='isAdminPrivMDM') )
{
    header("location: ./index.php");
    exit();
}
?>

<main class="ct">
    <div class=" h-screen b-content text-black">

        <h1 class="text-5xl">
            browse content management:
        </h1>
        <div>
        <form action="" method="POST">
            <input type="text">
        </form>
        </div>
    </div>

</main>


<script src="../js/Script"></script>
</body>
</html>