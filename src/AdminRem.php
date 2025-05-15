<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">
<main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
<div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">
<h1 class="text-5xl">
            Remove Workspace:
        </h1>
    <?php
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
            header('refresh:0');
        }
        $sql = "SELECT * FROM `workspaces`";
        $res = mysqlquery($sql);

    $count=0;
    while ($row = $res->fetch_assoc()) {
        $wk_ref=$row['wrkspace_ref'];
        $wk_name=$row['wrkspace_name'];
        $wk_title=$row['wrkspace_img_title'];
        $wk_desc=$row['wrkspace_img_desc'];
        $wk_status=$row['wrkspace_status'];
        $wk_img1=$row['wrkspace_img_path1'];
        $wk_img2=$row['wrkspace_img_path2'];
        $wk_img3=$row['wrkspace_img_path3'];
        $wk_img4=$row['wrkspace_img_path4'];
        ?>
        <hr>
        <form enctype="multipart/form-data"  name="form<?php echo $wk_ref;?>" method="POST" id="form<?php echo $wk_ref;?>" class="UPD-form" style="font-weight:bold;">
            <section class="UPD-ins">
                <input type="hidden" name="form_id" value="<?php echo $wk_ref; ?>"readonly>

                <div class="showElems">
                    <label for="name<?php echo $wk_ref;?>">Workspace Name:</label>
                    <input type="text" name="name" id="name<?php echo $wk_ref;?>" value="<?php echo $wk_name; ?>"readonly>
                </div>

                <div class="showElems">
                    <label for="title<?php echo $wk_ref;?>">Workspace title:</label>
                    <input type="text" name="title" id="title<?php echo $wk_ref;?>" value="<?php echo $wk_title; ?>"readonly>
                </div>

                <div class="showElems">
                    <label for="desc<?php echo $wk_ref;?>">Workspace Description: </label>
                    <input type="text" name="desc" id="desc<?php echo $wk_ref;?>" value="<?php echo $wk_desc; ?>" readonly>
                </div>

                <div class="showElems">
                    <label for="status<?php echo $wk_ref;?>">Workspace Status</label>
                    <input type="text" name="status" id="status<?php echo $wk_ref;?>" placeholder="currently: <?php echo $wk_status;?>"  readonly>
                </div>
            </section>

            <br>
        <h2 class="currHeader">Workspace images:</h2>
        <section class="UPD-ins">
            <div>
                <label><?php echo $wk_img1;?></label><br>
                <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img1;?>);" readonly >
            </div>
            <div>
                <label><?php echo $wk_img2;?></label><br>
                <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img2;?>);" readonly>
            </div>
            <div>
                <label><?php echo $wk_img3;?></label><br>
                <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img3;?>);" readonly>
            </div>
            <div>
                <label><?php echo $wk_img4;?></label><br>
                <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img4;?>);" readonly>
            </div>
        </section>
        <br><br>
        <input type="submit" class="del" value="REMOVE"style="background-color: oklch(63.7% 0.237 25.331);">
        </form>
        <hr>
        <?php 
    
    }?>
        </div>
    </main>
</div>
<?php

    if (!empty($_POST) && ($_SERVER['REQUEST_METHOD'])=='POST')
    {
        $sql="DELETE FROM workspaces WHERE `workspaces`.`wrkspace_ref` = ".$_POST['form_id'];
        mysqlquery($sql);  
    }
?>
