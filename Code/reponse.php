<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idgr = $reponse= "";
$idgr = $_GET['idg'];
if (isset($_POST['rep'])){
    $queID=$_POST["rep"];
;}
if (isset($_POST['repondre'])){
    $queID=$_POST["repondre"];
    $reponse=$_POST["reponse"];
    $query = "INSERT INTO reponse (reponse, groupID, questionID,UserId,Time) 
            VALUES('$reponse','$idgr','$queID','$id',CURRENT_TIME())";
      mysqli_query($db, $query);
      echo "<meta http-equiv='refresh' content='0'>";
    }
?>