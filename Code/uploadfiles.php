<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idgr = "";
$idgr = $_GET['idg'];
    if (isset($_POST['upload'])){
        $filename =$id."-".$_FILES["uploadfile"]["name"];
        // For image upload
        $target_dir = "filesupload/";
        $fileDestination = 'filesupload/'.$filename;
        move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $fileDestination);
          $queryfileup = "INSERT INTO fileupload (groupID ,StudentID, file_name,Time) 
                  VALUES('$idgr','$id','$filename',CURRENT_TIME())";
            mysqli_query($db, $queryfileup);
            echo "<meta http-equiv='refresh' content='0'>";
      }
?>