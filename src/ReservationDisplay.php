<?php
    // define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');

$sql = "SELECT * FROM `reservations`AS r JOIN `workspaces` AS w ON r.wrkspace_id=w.wrkspace_ref";
$rest=mysqlquery($sql);
$rowresv=$rest -> fetch_all(MYSQLI_ASSOC);

?>
<link rel="stylesheet" href="../style/accstyle.css">

<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">
<main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
<div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">
<h1 class="text-5xl">
           Display Reservations:
        </h1>
<div class="reservations">
                <h3 class="section-title">Current Reservations</h3>
                <?php 

if (mysqli_num_rows($rest) > 0): ?>
                    <?php foreach ($rowresv as $res):
    $start = date_create(htmlspecialchars($res['reserv_start']));
    $startFormatted = date_format($start, "D, d M Y  h:ia");
    
    $end = date_create(htmlspecialchars($res['reserv_end']));
    $endFormatted = date_format($end, "D, d M Y  h:ia");

    $wrkspace = htmlspecialchars($res['wrkspace_name']);
    $ref = htmlspecialchars($res['reserv_ref']);
                        ?>
                        <div class="reservation-item">
                            <span><?= htmlspecialchars($res['wrkspace_name']) ?> — <b style="color: green;">from: </b><?=" ".$startFormatted?> <b style="color: red;">to:</b><?=" ".$endFormatted?></span>
                            <span>#<?= htmlspecialchars($res['reserv_ref']) ?></span>
                        </div>
                        <form action="./remresev.php" method="POST">
                            <input type="hidden" name="remm">
                            <input type="submit" name="remove" class="del" value="REMOVE id: <?php echo $res['reserv_ref']?>"style="background-color: oklch(63.7% 0.237 25.331);">
                        </form>

                        <?php 
                    // if (!empty($_POST) && ($_SERVER['REQUEST_METHOD'])=='POST'):
                    //     print_r($_POST);
                    //     // $sql="DELETE FROM reservations WHERE `reservations`.`reserv_ref` = ".substr($_POST['remove'], 11);
                    //     // mysqlquery($sql); 
                    //     // echo "<script>location.reload()</script>";
                    // endif;
                endforeach; ?>
                <?php else: ?>
                    <p>No current reservations.</p>
                <?php endif; ?>
            </div>
            </div>
            </main>
            </div>