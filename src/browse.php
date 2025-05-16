
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
        


?>


<div class="f-browse ">
    <section class="b-content">
        
    <div class="f-wrapper wrapper" style="justify-content: space-evenly;">
        <div class="browse-text">
            <h1 class="text-5xl text-black "> <?php echo $row['wrkspace_name'];?>: </h1>
            <h4><?php echo $row['wrkspace_img_title'];?></h4>
            <p><?php echo $row['wrkspace_img_desc'];?></p>
<!-- ****************************************************************************** -->
            <h4 class="text-shadow-lg/40" style="color:<?php echo $color=$row['wrkspace_status']=='open'?'oklch(0.56 0.1768 156.71)':'oklch(46.6% 0.579 58.318)';?>;"> status: <button type="button" style="width:71px;"><b><?php echo $row['wrkspace_status'];?></b></button></h4>
            <?php 
            if($row['wrkspace_status']=='open')
            {
                ?> 
<button class="reserve" type="button" style="margin: 2rem auto;">
  <!-- Reserve button to open modal -->
  <a
    id="<?php echo $row['wrkspace_ref']; ?>"
    href="#resv"
    class="text-blue-600 hover:underline cursor-pointer"
    onclick="const modal = document.getElementById('resv' + this.id); modal.classList.remove('hidden'); modal.focus(); return false;"
  >
    Reserve
  </a>
</button>

                <?php
                
            }
            else
            {
                $sql = "SELECT `reserv_end` FROM `reservations` WHERE `wrkspace_id`=".$row['wrkspace_ref']." ORDER BY `reserv_end` DESC";
                $result=mysqlquery($sql);
                if(mysqli_num_rows($result)>0)
                {
                    $resrv_end=mysqli_fetch_row($result)[0];
                    $formated_resrv_end=date_create($resrv_end);                                
                    ?> 
                        <h4 class="text-shadow-lg/40" style="margin: 1rem 0rem 0rem 0rem;">until:</h4>
                        <button type="button" class="nunito-200 free-date">
                            <b>
                                <?php echo date_format($formated_resrv_end,"D, d M Y  h:ia");?>
                            </b>
                        </button>
                    <?php
                    // echo 'here'.(time()>$resrv_end);
                    $current=date('Y-m-d H:m:s',time());
                    if($current>$resrv_end)
                    {
                        $sql = "UPDATE `workspaces` SET `wrkspace_status`= 'open' WHERE `wrkspace_ref`=".$row['wrkspace_ref'];
                        $res=mysqlquery($sql);
                    }
                }
                else
                {
                        $sql = "UPDATE `workspaces` SET `wrkspace_status`= 'open' WHERE `wrkspace_ref`=".$row['wrkspace_ref'];
                        $res=mysqlquery($sql);

                }
            }
            ?>
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
<!-- Modal -->
<div
  id="resv<?php echo $row['wrkspace_ref']; ?>"
  tabindex="-1"
  class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 hidden"
  role="dialog"
  aria-modal="true"
  aria-labelledby="resv-title-<?php echo $row['wrkspace_ref']; ?>"
>
  <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-lg relative">
    <!-- Close button -->
    <button
      type="button"
      style="color: #fb2c36;font-weight:bold;background-color:white;"
      aria-label="Close reservation form"
      class="absolute top-4 right-4 text-gray-400 hover:text-gray-700 text-2xl leading-none"
      onclick="document.getElementById('resv<?php echo $row['wrkspace_ref']; ?>').classList.add('hidden')"
    >
      &times;
    </button>

    <form action="./ReservationManagement.php" method="POST" class="razer space-y-6">
      <input type="hidden" name="wrkspace_id" value="<?php echo $row['wrkspace_ref']; ?>">

      <h2
        id="resv-title-<?php echo $row['wrkspace_ref']; ?>"
        class="text-3xl font-semibold text-gray-800 text-center"
      >
        Reserve Workspace
      </h2>

      <div>
        <label for="start_time_<?php echo $row['wrkspace_ref']; ?>" class="block text-sm font-medium text-gray-700">
          Start Date & Time
        </label>
        <input
          type="datetime-local"
          id="start_time_<?php echo $row['wrkspace_ref']; ?>"
          name="start_time"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
          required
        >
      </div>

      <div>
        <label for="end_time_<?php echo $row['wrkspace_ref']; ?>" class="block text-sm font-medium text-gray-700">
          End Date & Time
        </label>
        <input
          type="datetime-local"
          id="end_time_<?php echo $row['wrkspace_ref']; ?>"
          name="end_time"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
          required
        >
      </div>

      <div class="flex justify-end gap-3 pt-4">
        <button
          type="button"
          style="background-color: #fb2c36;font-weight:bold;color:white;"
          class="cancel"
          onclick="document.getElementById('resv<?php echo $row['wrkspace_ref']; ?>').classList.add('hidden')"
        >
          Cancel
        </button>
        <button
          type="submit"
          class="reserve w-[91px] px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-medium"
        >
          Confirm
        </button>
      </div>
    </form>
  </div>
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