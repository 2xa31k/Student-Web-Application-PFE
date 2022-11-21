<?php
// Turn off all error reporting
error_reporting(0);
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$val1=0;
$val2=0;
$idgr = $_GET['idg'];
$query1 = "SELECT * FROM joingroup WHERE UserID='$id' AND GroupID='$idgr'";
$results1 = mysqli_query($db, $query1);
if(mysqli_num_rows($results1) !=0) {
    $val1=1;
} else {
    $val1=0;
}
$query2 = "SELECT * FROM joingroup WHERE UserID='$id' ";
$results2 = mysqli_query($db, $query2);
if(mysqli_num_rows($results2) !=0) {
    $val2=1;
} else {
    $val2=0;
}
?>