<div class="hidenav-height bg-[url(../images/browse1.webp)] min-h-screen h-100% bg-no-repeat bg-cover">
<main class="ct flex justify-center" style="padding-top:8vh;padding-top:8dvh;">
<div class="added min-h-[fit-content] b-content text-black bg-[#fffff5]/85">
<h1 class="text-5xl">
            Update content:
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
                <input type="hidden" name="form_id" value="<?php echo $wk_ref; ?>">

                <div class="showElems">
                    <label for="name<?php echo $wk_ref;?>">Workspace Name:</label>
                    <input type="text" name="name" id="name<?php echo $wk_ref;?>" value="<?php echo $wk_name; ?>">
                </div>

                <div class="showElems">
                    <label for="title<?php echo $wk_ref;?>">Workspace title:</label>
                    <input type="text" name="title" id="title<?php echo $wk_ref;?>" value="<?php echo $wk_title; ?>">
                </div>

                <div class="showElems">
                    <label for="desc<?php echo $wk_ref;?>">Workspace Description: </label>
                    <input type="text" name="desc" id="desc<?php echo $wk_ref;?>" value="<?php echo $wk_desc; ?>">
                </div>

                <div class="showElems">
                    <label for="status<?php echo $wk_ref;?>">Workspace Status</label>
                    <input type="text" id="status<?php echo $wk_ref;?>" placeholder="currently: <?php echo $wk_status;?>" readonly>
                    <select name="status">
                        <option value="open" <?php if(($wk_status == 'open') || ($_SESSION['data_'.$wk_ref]['status'] ?? '') == 'open') echo 'selected'; ?>>open</option>
                        <option value="reserved" <?php if(($wk_status == 'reserved') || ($_SESSION['data_'.$wk_ref]['status'] ?? '') == 'reserved') echo 'selected'; ?>>reserved</option>
                    </select>
                </div>
            </section>

            <br>
        <section>
            <div class="showElems" style="gap:1rem;">
                <input class="image" name="<?php echo $wk_ref.'1';?>" accept="image/*" type="file" >
                <input class="image" name="<?php echo $wk_ref.'2';?>" accept="image/*" type="file" >
                <input class="image" name="<?php echo $wk_ref.'3';?>" accept="image/*" type="file" >
                <input class="image" name="<?php echo $wk_ref.'4';?>" accept="image/*" type="file" >
            </div>
        </section>
        
        <br><br>
        <h2 class="currHeader">current images</h2>
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
        <input type="submit" class="UPD" value="Update">
        <p id="status_form<?php echo $wk_ref; ?>" style="color: green;"></p>
        </form>
        <hr>
        <?php 
    
    }?>
        </div>
    </main>
</div>
<script>
                function getImages()
                {
                    const files = document.querySelectorAll('.image');
                    fileinput = function () {
                        {
                                    color = this.value ? 'green':'red';
                                    this.style.setProperty('color',color);
                                    console.log(this.value);
                                }
                    }
                        if(files)
                        {
                            for (let i=0;i<files.length;i++)
                            {
                                
                                files[i].addEventListener('change',fileinput,false);
                            }
                        }
                }
                getImages();
</script>
<?php
    $targetDir = "../images/"; 
    $uploadedFileNames = [];

    $imglist=[];
    $input=true;
    // print_r($_FILES);
    if (!empty($_POST) && ($_SERVER['REQUEST_METHOD'])=='POST'){
        // echo isset($_FILES);
        foreach ($_FILES as $key=>$obj)
        {
            $imglist[]=$key;
            // echo $key;
        }
        foreach($imglist as $key)
        {
            empty($_FILES[$key]['name']) && $input=false;
        }
    if($input)
    {
        $imgname=[];
        foreach($imglist as $key=>$obj)
        {

            if (isset($_FILES[$obj]) && !empty($_FILES[$obj]['name'])&& $_FILES[$obj]['error'] === UPLOAD_ERR_OK) 
            {
                $fileTmpPath = $_FILES[$obj]['tmp_name'];
                $fileName = basename($_FILES[$obj]['name']);
                $fileType = mime_content_type($fileTmpPath);
                $imgname[]=$fileName;
                if (strpos($fileType, 'image/') === 0) // Check if the uploaded file is an image
                {
                    $destination = $targetDir . $fileName;
                if (in_array($fileName, $uploadedFileNames)) // Check if the same file name was uploaded already in this session
                {
                    echo "<script>console.log('Duplicate upload detected for ".$fileName.".');</script>";
                    continue; // Skip this file
                }
                        
                        $uploadedFileNames[] = $fileName;// Add file name to the array for further duplicate checking

                        $destination = $targetDir . $fileName;
            
                        
                        if (file_exists($destination)) {// Check if the file already exists in the target directory
                            echo "<script>console.log('File ".$fileName." already exists in the target directory.');</script>";
                            continue; // Skip this file
                        }

                    if (move_uploaded_file($fileTmpPath, $destination)) {
                        echo "<script>console.log('File ".$fileName." uploaded successfully.');</script>";
                    } else {
                        echo "<script>console.log('Error moving ".$fileName.".');</script>";
                    }
                } else {
                    echo "<script>console.log('File ".$fileName." is not an image.');</script>";
                }
            } 
            else 
            {
                echo "<script>console.log('No file uploaded for ".$fileName." or upload error.');</script>";
            }
            // $imglist = array_replace($imglist,[$key=>$fileName]);
            // $imglist[$key]=$fileName;
            // echo $imglist[$key];
        }
        $sql="UPDATE `workspaces` SET `wrkspace_name` = '".htmlspecialchars($_POST['name'])."', `wrkspace_img_title` = '".htmlspecialchars($_POST['title'])."', `wrkspace_img_desc` = '".htmlspecialchars($_POST['desc'])."',`wrkspace_status` = '".htmlspecialchars($_POST['status'])."', `wrkspace_img_path1` = '".$imgname[0]."', `wrkspace_img_path2` = '".$imgname[1]."', `wrkspace_img_path3` = '".$imgname[2]."', `wrkspace_img_path4` = '".$imgname[3]."' WHERE `workspaces`.`wrkspace_ref` = '".htmlspecialchars($_POST['form_id'])."';";
    }
    // print_r($imglist);
    // if(!empty($imglist))
    // {
    // }
    else
    {
        $sql="UPDATE `workspaces` SET `wrkspace_name` = '".htmlspecialchars($_POST['name'])."', `wrkspace_img_title` = '".htmlspecialchars($_POST['title'])."', `wrkspace_img_desc` = '".htmlspecialchars($_POST['desc'])."',`wrkspace_status` = '".htmlspecialchars($_POST['status'])."' WHERE `workspaces`.`wrkspace_ref` = '".htmlspecialchars($_POST['form_id'])."';";
    }
    // echo $sql;
    mysqlquery($sql);  
    
    }

?>
