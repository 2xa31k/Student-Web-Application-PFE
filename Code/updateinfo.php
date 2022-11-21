<?php
require('server.php');
require('logininfo.php');
error_reporting(0);
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
if (isset($_POST['update'])) {
  $fillier1 = $_POST["FIL"];
  $semestre1 =implode(',', $_POST['sem']);
  $section1 = $_POST["optradio"];
if (isset($fillier1))
{
  $query2="UPDATE studentinfo SET Filliere = '$fillier1' WHERE StudentId='$id'";
  mysqli_query($db, $query2);
}
if (!empty($semestre1))
{
  $query3="UPDATE studentinfo SET Semestre = '$semestre1' WHERE StudentId='$id'";
  mysqli_query($db, $query3);
}
if (isset($section1))
{
  $query4= "UPDATE studentinfo SET Section = '$section1' WHERE StudentId='$id'";
  mysqli_query($db, $query4);
}
$pfrlimgtest=$_FILES["profileImage"]["name"];
if(!empty($pfrlimgtest)){
  $querydel="DELETE profile_image FROM studentinfo WHERE profile_image='$prflimage' AND StudentId='$id'";  
  mysqli_query($db, $querydel);
$profileImageName = $id."-".$_FILES["profileImage"]["name"];
// For image upload
$target_dir = "ImagesPrfl/";
$fileDestination = 'ImagesPrfl/'.$profileImageName;
move_uploaded_file($_FILES["profileImage"]["tmp_name"], $fileDestination);
$query5 = "UPDATE studentinfo SET profile_image = '$profileImageName' WHERE StudentId='$id'";
      mysqli_query($db, $query5);
}
echo "<meta http-equiv='refresh' content='0'>";
}


?>