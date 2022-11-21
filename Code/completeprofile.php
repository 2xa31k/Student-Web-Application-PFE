<?php
require('server.php');
require('logininfo.php');
error_reporting(0);
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$fillier = $semestre = $section = "";
if (isset($_POST['comp'])){
  $fillier = $_POST["FIL"];
  $semestre =implode(',', $_POST['sem']);
  $section = $_POST["optradio"]; 
  $profileImage =$_FILES["profileImage"]["name"];
  if(!empty($profileImage)){
  $profileImageName =$id."-".$_FILES["profileImage"]["name"];
  // For image upload
  $target_dir = "ImagesPrfl/";
  $fileDestination = 'ImagesPrfl/'.$profileImageName;
  move_uploaded_file($_FILES["profileImage"]["tmp_name"], $fileDestination);}
  else $profileImageName ="";
    $query = "INSERT INTO studentinfo (StudentId ,Filliere, Semestre, Section,profile_image) 
            VALUES('$id','$fillier','$semestre','$section','$profileImageName')";
      mysqli_query($db, $query);
}
?>