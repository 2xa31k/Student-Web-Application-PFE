<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idg=$idu="";
if (isset($_POST['rejoindre'])){
    $idg=$_POST["rejoindre"];
    $idu=$id;
    $query = "INSERT INTO joingroup (GroupID, UserID)
            VALUES('$idg','$idu')";
    mysqli_query($db, $query);
}
    ?>

    