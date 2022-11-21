<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idg=$idu="";
if (isset($_POST['quitter'])){
    $idg=$_POST["quitter"];
    $idu=$id;
    $query = "DELETE FROM joingroup WHERE GroupID='$idg' AND UserID='$idu' ";
    mysqli_query($db, $query); echo "<meta http-equiv='refresh' content='0'>";}
    
    ?>

    