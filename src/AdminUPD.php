<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">
<main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
<div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">
<h1 class="text-5xl">
            Update content:
        </h1>
    <?php
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
        <form action="" method="POST" id="<?php echo $wk_ref;?>" class="UPD-form" style="font-weight:bold;">
            <section class="UPD-ins">

                <div class="showElems">
                    <label for="name<?php echo $wk_ref;?>">Workspace Name:</label>
                    <input type="text" id="name<?php echo $wk_ref;?>" placeholder="<?php echo $wk_name;?>">
                </div>

                    <div class="showElems">
                        <label for="title<?php echo $wk_ref;?>">Workspace title:</label>
                        <input type="text" id="title<?php echo $wk_ref;?>" placeholder="<?php echo $wk_title;?>">
                    </div>

                    <div class="showElems">
                        <label for="desc<?php echo $wk_ref;?>">Workspace Description: </label>
                        <input type="text" id="desc<?php echo $wk_ref;?>" placeholder="<?php echo $wk_desc;?>">
                    </div>

                    <div class="showElems">
                        <label for="status<?php echo $wk_ref;?>">Workspace Status</label>
                        <input type="text" id="status<?php echo $wk_ref;?>" placeholder="currently: <?php echo $wk_status;?>" readonly>
                        <select name="status" id="<?php echo $wk_ref;?>">
                            <option value="open">open</option>
                            <option value="reserved">reserved</option>
                        </select>
                    </div>

                </section>
            
            <br>
        <section>
            <div class="showElems" style="gap:1rem;">
                <input type="file" >
                <input type="file" >
                <input type="file" >
                <input type="file" >
            </div>
        </section>
            
            <br>
            <br>
        <h2 class="currHeader">current images</h2>

            <section class="UPD-ins">
            <div>
                <label for=""><?php echo $wk_img1;?></label><br>
                <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img1;?>);" >
            </div>


                <div>
                    <label for=""><?php echo $wk_img2;?></label><br>
                    <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img2;?>);" >
                </div>
                
                <div>
                    <label for=""><?php echo $wk_img3;?></label><br>
                    <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img3;?>);" >
                </div>

                <div>
                    <label for=""><?php echo $wk_img4;?></label><br>
                    <input class="Img-ins" style="background-image:url(../images/<?php echo $wk_img4;?>);" >
                </div>
                </section>
            <br>
            <br>
            <input type="submit" class="UPD" name="update<?php echo $wk_ref;?>" value="Update">
        </form>
        <hr>
        <?php }?>
        </div>
    </main>
</div>