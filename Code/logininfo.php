<?php
// Turn off all error reporting
error_reporting(0);
require('server.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$em=$_SESSION['email'];
$surname="";
$name="";
$id="";
$val=0;
$fillier = "";
$semestre = "";
$prflimage="";
$checkwarn="";
$query = "SELECT * FROM students WHERE email='$em'";
$results = mysqli_query($db, $query);
$row = mysqli_fetch_array($results);
if(mysqli_num_rows($results) == 1) {
    $surname = $row['Surname'];
    $name = $row['Name'];
    $id=$row['ID'];
    $warn=$row['warn'];
} 
    if($warn==1)
         $checkwarn=1;
$query1 = "SELECT * FROM studentinfo WHERE StudentId='$id'";
$results1 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_array($results1);
if(mysqli_num_rows($results) == 1) {
    $fillier = $row1['Filliere'];
    $semestre = $row1['Semestre'];
    $section = $row1['Section'];
    $prflimage= $row1['profile_image'];
} 

$query2 = "SELECT * FROM studentinfo WHERE StudentId='$id'";
$results2 = mysqli_query($db, $query2);
if(mysqli_num_rows($results2) != 0) {
    $val=1;
} else {
    $val=0;
}


?>