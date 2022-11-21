<?php
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');

if (isset($_POST['creategroupe'])){
  $fillier = $_POST["FIL"];
  $name = $_POST["groupname"];
  $semestre = $_POST["optradio"]; 
    $query2 = "INSERT INTO groups (Fillier,Name,Semestre) 
            VALUES('$fillier','$name','$semestre')";
      mysqli_query($db, $query2);
}
if (isset($_POST['edit'])){
    $idg=$_POST['edit'];
    $fillier1 = $_POST["FIL1"];
    $name1 =$_POST["groupname1"];
    $semestre1 = $_POST["optradio1"]; 
      $query1 = "UPDATE groups SET Name='$name1',Fillier='$fillier1',Semestre='$semestre1' WHERE groupID='$idg'";
        mysqli_query($db, $query1);
  }
?>