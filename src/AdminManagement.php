<?php
if ($_SERVER['REQUEST_METHOD']==='POST' && !empty($_POST))
{
    include('connect.php');
    $counter=0;
    $singleform=[];//list for each workspace
    $full=[];// list contains the workspace lists
    $targetDir = "../images/"; 
    $uploadedFileNames = [];
    // print_r($_POST);//for the normal inputs and FILES for the images
    // print_r($_FILES);//for the normal inputs and FILES for the images
    $imglist=[];
    foreach ($_FILES as $key=>$obj)
    {
        $imglist[]=$key;
    }
    // print_r($imglist);
    $ind=0;
    foreach ($_POST as $key=>$obj)
    {
        if (empty(htmlspecialchars($obj)))
        {
            header("location: ./Admin.php");
            exit();
        }
        else
        { 
            if ($counter<3)
            {
                echo $obj;
                $counter+=1;
                $singleform[]=htmlspecialchars($obj);
            }
            else
            {
                $counter = 0;
                $singleform[]=htmlspecialchars($obj);
                for ($i=($ind*4);$i<($ind*4)+4;$i++)
                {
                    $singleform[]=$_FILES[$imglist[$i]]['name'];
                }
                $ind+=1;
                $full[]=$singleform;
                $singleform=[];
            }
        }
    }
    // print_r($full);

    foreach($imglist as $key)
    {

            if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES[$key]['tmp_name'];
                $fileName = basename($_FILES[$key]['name']);
                $fileType = mime_content_type($fileTmpPath);
                if (strpos($fileType, 'image/') === 0) // Check if the uploaded file is an image
                {
                    $destination = $targetDir . $fileName;
                if (in_array($fileName, $uploadedFileNames)) // Check if the same file name was uploaded already in this session
                {
                    echo "Duplicate upload detected for '$fileName'.<br>";
                    continue; // Skip this file
                }
                        
                        $uploadedFileNames[] = $fileName;// Add file name to the array for further duplicate checking

                        $destination = $targetDir . $fileName;
            
                        
                        if (file_exists($destination)) {// Check if the file already exists in the target directory
                            echo "File '$fileName' already exists in the target directory.<br>";
                            continue; // Skip this file
                        }

                    if (move_uploaded_file($fileTmpPath, $destination)) {
                        echo "File '$fileName' uploaded successfully.<br>";
                    } else {
                        echo "Error moving '$fileName'.<br>";
                    }
                } else {
                    echo "File '$fileName' is not an image.<br>";
                }
            } else {
                echo "No file uploaded for '$fileName' or upload error.<br>";
            }

        }
        foreach ($full as $key=>$obj)
        {

            $sql = "INSERT INTO `workspaces` (`wrkspace_name`, `wrkspace_img_title`, `wrkspace_img_desc`, `wrkspace_img_path1`,  `wrkspace_img_path2`, `wrkspace_img_path3`, `wrkspace_img_path4`,`wrkspace_status`) VALUES ('$obj[0]', '$obj[1]','$obj[2]','$obj[4]','$obj[5]', '$obj[6]', '$obj[7]', '$obj[3]')";
    
            $query = mysqlquery($sql);
        }
        header("location: ./Admin.php");
        exit();
}
else
{
    header("location: ./Admin.php");
    exit();
}
