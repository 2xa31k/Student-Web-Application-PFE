<!-- verification sign-in-->
<?php 
  session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }
?>
<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"><link rel="icon" href="Img/Edu.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Groupes</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="Css/groupes.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  </head>

  <body>
  <?php include('header.php') ?>
  <?php require('server.php');?>
  <?php require('logininfo.php');?>
  <?php include('rejoindre.php') ?>
  <?php require('checkjoin.php') ?>
  <h1 class="page-header">Groups</h1>
  <div class="container">

  <div class="row">

          <div class="col-md">
            <div class="groups">
            <?php
              $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query10 = "SELECT * FROM joingroup Where UserID='$id' ORDER BY RAND()";
              $result10 = $mysqli->query($query10);

              while($row10 = $result10->fetch_array()){
                $idg10=$row10[GroupID];
                $query11 = "SELECT * FROM Groups Where groupID='$idg10'";
              $result11 = $mysqli->query($query11);

              while($row11 = $result11->fetch_array()){
              echo '<div class="group-item">
              <img src="img/group.png" alt="">
              <h4 class="text-muted"><a href="groupepage.php?idg='.$row11[groupID].'" class="text-muted">'.$row11[Name].'</a></h4>
              <p>'.$row11[Semestre].' Module.</p>
              <p><a href="groupepage.php?idg='.$row11[groupID].'" class="btn btn-primary bg-secondary">visite</a></p>
            </div>
            <div class="clearfix"></div>'
              ;};}
?>

            </div>
          </div>


          





          </div>
          </div>