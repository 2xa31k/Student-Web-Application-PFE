<?php 
  session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"><link rel="icon" href="Img/Edu.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>page de recherche</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="Css/groupes.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>

  <body>
  <?php error_reporting(0);?>
  <?php include('header.php') ?>
  <?php require('server.php');?>
  <?php require('logininfo.php');?>
  <?php include('rejoindre.php') ?>
  <?php require('checkjoin.php') ?>
  <?php $search = $_GET['q'];?>
  <div class="container mt-3">
  <form class="form" action="search.php" methode="get" >
    <div class="md-form form-sm my-0">
      <input class="form-control form-control-sm mr-sm-2 mb-6" name="q" type="text" placeholder="rechercher"
        aria-label="Search">
    </div>
    <button class="btn btn-sm align-middle btn-outline-white" hidden style="background-color:grey;" type="submit">Search</button>
  </form>


  <h4>You searched For <?php echo '"'.$search.'"'  ?>
  <h3>Results:</h3>
  <?php
  echo "<h5>groups:</h5>";
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
$query = "SELECT * FROM Groups Where Name LIke '%$search%' AND Fillier='$fillier'";
$result = $mysqli->query($query);

while($row = $result->fetch_array()){
  $groupname=$row[Name];
  echo '<div class="row">
  <div class="col" style="width:100%;">
  <div class="media-left"><a href="#"><h6><img src="Img/group.png" alt="group" style="height:50px;" class="media-object img-circle thumb64">'.$groupname.'</h6></a></div>
  </div>
  </div>
  <div class="clearfix"></div>';}

  ?>
  <?php
  echo "<h5>Etudiants:</h5>";
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
$prfl="";
$query1 = "SELECT * FROM students as s , studentinfo as si Where s.ID=si.StudentId AND (s.Name LIke '%$search%' OR s.Surname LIKE '%$search%')";
$result1 = $mysqli->query($query1);

while($row1 = $result1->fetch_array()){
  $stuname=$row1[Name];
  $stuSurname=$row1[Surname];
  $idc=$row1[ID];
  $prfl=$row1[profile_image];
  echo '<div class="row">
  <div class="col" style="width:100%;">';
  if(!empty($prfl))
  echo '<div class="media-left"><a href="collegue?id='.$idc.'"><h6><img src="ImagesPrfl/'.$prfl.'" style="height:60px;width=80px;" alt="User" class="media-object img-circle thumb64">'.$stuname.' '.$stuSurname.'</a></div>';
  else echo '  <div class="media-left"><a href="collegue?id='.$idc.'"><h6><img src="Img/user.jpg" style="height:50px;" alt="User" class="media-object img-circle thumb64">'.$stuname.' '.$stuSurname.'</a></div>
  ';
  echo '
  </div>
  </div>
  <div class="clearfix"></div>';}

  ?>
  </div>