
    <?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
include('./connect.php');
!$conn && die('error: could not connect!');
?>
<main id = "Browse-container" class=" browse hidenav-height first-home-content bg-[url(../images/browse1.webp)]">
<?php 
    $sql = "SELECT * FROM `workspaces`";
    $res = mysqlquery($sql);
    $count=0;
    while ($row = $res->fetch_assoc()) {
        // print_r($row);

?>
<div class="f-browse ">
    <section class="b-content">
        
    <div class="f-wrapper wrapper">
        <div class="browse-text">
            <h1 class="text-5xl text-black "> <?php echo $row['wrkspace_name'];?>: </h1>
            <h4><?php echo $row['wrkspace_img_title'];?></h4>
            <p><?php echo $row['wrkspace_img_desc'];?></p>
<!-- ****************************************************************************** -->
            <h4 class="text-shadow-lg/40" style="color:<?php echo $color=$row['wrkspace_status']=='open'?'green':'oklch(66.6% 0.179 58.318)';?>;"> status: <button type="button"><b><?php echo $row['wrkspace_status'];?></b></button></h4>
<!-- ****************************************************************************** -->
        </div>
        <div class="container">

        <input type="radio" name="slide<?php echo $count;?>" id="c<?php echo $count;?>1" checked>
                <label for="c<?php echo $count;?>1" class="card" style="background-image:url(../images/<?php echo $row['wrkspace_img_path1'];?>)">
                    <div class="row">

                    </div>
                </label>
        <input type="radio" name="slide<?php echo $count;?>" id="c<?php echo $count;?>2" >
                <label for="c<?php echo $count;?>2" class="card" style="background-image:url(../images/<?php echo $row['wrkspace_img_path2'];?>)">
                    <div class="row">

                    </div>
                </label>
        <input type="radio" name="slide<?php echo $count;?>" id="c<?php echo $count;?>3" >
                <label for="c<?php echo $count;?>3" class="card" style="background-image:url(../images/<?php echo $row['wrkspace_img_path3'];?>)">
                    <div class="row">

                    </div>
                </label>
        <input type="radio" name="slide<?php echo $count;?>" id="c<?php echo $count;?>4" >
                <label for="c<?php echo $count;?>4" class="card" style="background-image:url(../images/<?php echo $row['wrkspace_img_path4'];?>)">
                    <div class="row">

                    </div>
                </label>
            </div>

        </div>
    </section>
</div>
<?php
        $count+=1;
        
    }



    
?>
</main>
    <!-- <script src="../js/Browse.js"></script> -->

        <script>
        const nav = document.getElementsByClassName('navybar')[0];
        nav.classList.add('sticky');
        </script>   
        <script src="../js/Scripts.js"></script>
    </body>
</html>