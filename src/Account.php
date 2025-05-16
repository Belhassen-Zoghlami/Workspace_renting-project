<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/src/navbar.php');
require_once './connect.php';

$sql = "SELECT * FROM `users` WHERE `user_id`=".$_SESSION['userid'];
$res=mysqlquery($sql);
$rowuser=mysqli_fetch_assoc($res);

$sql = "SELECT * FROM `reservations`AS r JOIN `workspaces` AS w ON r.wrkspace_id=w.wrkspace_ref WHERE r.user_id = ".$_SESSION['userid'];
$rest=mysqlquery($sql);


$rowresv=$rest -> fetch_all(MYSQLI_ASSOC);
// print_r($rowresv);
$reservations = [
    ['id' => 101, 'item' => 'Room 204', 'date' => '2025-06-01'],
    ['id' => 102, 'item' => 'Conference Hall', 'date' => '2025-06-10'],
];



?>

<script>
            const nav = document.getElementsByClassName('nv');
        nav[0].classList.remove('NavList');
        nav[1].classList.remove('NavList');
        nav[0].classList.add('NavAcc');
        nav[1].classList.add('NavAcc');
</script>
<link rel="stylesheet" href="../style/accstyle.css">


<div class="hidenav-height containerr">
    <header class="ovrview">
        <h1 style="font-size:xx-large;">Account Overview</h1>
    </header>

    <main>
        <div class="cardd">

            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h2 class="section-title">Hello, <span style="color: var(--accent);"><?= htmlspecialchars($rowuser['name'])." ".htmlspecialchars($rowuser['last_name']) ?></span></h2>
                <button class="accent-button reserve" onclick="toggleEdit()">Edit</button>
            </div>

            <!-- Static User Info -->
            <div class="user-info" class="hiddenn" id="view-info">
                <div><strong>Username:</strong> <?= htmlspecialchars($rowuser['username']) ?></div>
                <div><strong>Email:</strong> <?= htmlspecialchars($rowuser['email']) ?></div>
                <div><strong>Member Since:</strong> <?= htmlspecialchars($rowuser['date-created']) ?></div>
            </div>

            <!-- Edit Form -->
            <form id="edit-form" class="hiddenn edform" action="update_account.php" method="POST">
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($rowuser['username']) ?>">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($rowuser['email']) ?>">
                </div>
                <div>
                    <label for="curr_password">Current Password</label>
                    <input type="password" name="curr_password">
                </div>
                <div>
                    <label for="password">New Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password">
                </div>
                <div style="grid-column: span 2;margin: 0rem auto 0rem auto;">
                    <input type="hidden" name="ref" value="<?=htmlspecialchars($rowuser['user_id'])?>">
                    <button class="reserve" type="submit" class="accent-button">Save Changes</button>
                </div>
            </form>

            <!-- Reservations -->
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
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No current reservations.</p>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <footer>
        &copy; <?= date('Y') ?><h4 class="major-regular text-shadow-lg/70 logo" style="margin: auto 0;font-weight:bold;font-size:1rem;padding:0 0.5rem;"> Worki-n </h4> All rights reserved.
    </footer>
</div>

<script>
    function toggleEdit() {
        document.getElementById("view-info").classList.toggle("hiddenn");
        document.getElementById("edit-form").classList.toggle("hiddenn");
    }
</script>
<script src="../js/Scripts.js"></script>
<?php
print_r($_SESSION);
?>
</body>
</html>
