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
  <h1 class="page-header">Groups</h1>
  <div class="container-lg my-3 pt-3">

        <div class="row">
  <div class="col-md">
            <div class="groups">
            <h2 class="">S2:</h2>
            <?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
if ($fillier == "SMA")
      $fillier1="SMI";
    else $fillier1=$fillier;
              $query = "SELECT * FROM Groups Where Fillier='$fillier1' AND Semestre='S2' ORDER BY RAND() ";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo '
              <div class="group-item">
              <img src="Img/group.png" alt="">
              <h4 class="text-muted"><a href="groupepage.php?idg='.$row[groupID].'" class="text-muted">'.$row[Name].'</a></h4>
              <p>'.$row[Semestre].' Module.</p><h1>&nbsp;</h1>';

              $idgr15=$row['groupID'];
              $query15 = "SELECT * FROM joingroup WHERE UserID='$id'AND GroupID='$idgr15'";
              $results15 = mysqli_query($db, $query15);
              if(mysqli_num_rows($results15) !=0) {
               $val3=1;
              } else {
              $val3=0;
              }
              if ($val3==0){
              echo'<p>
              <form action="groupepage.php?idg='.$row[groupID].'" method="post">
              <button type="submit" name="rejoindre" id="rejoindre" value="'.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">Rejoindre Group</button>
                </form>
              </p>
            </div>
            <div class="clearfix"></div>
              ';}
              else {
                echo '<p><div class="clearfix"></div>
                <a href="groupepage.php?idg='.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;" >visite</a>
                <p></div>
                <div class="clearfix"></div></p>';
              }
              ;}
?>
              
              
            </div>
          </div>
          <div class="col-md">
            <div class="groups">
            <h2 class="">S4:</h2>
          <?php  $query = "SELECT * FROM Groups Where Fillier='$fillier' AND Semestre='S4'";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo '
              
              <div class="group-item">
              <img src="Img/group.png" alt="">
              <h4 class="text-muted"><a href="groupepage.php?idg='.$row[groupID].'" class="text-muted">'.$row[Name].'</a></h4>
              <p>'.$row[Semestre].' Module.</p><h1>&nbsp;</h1>';
              
              $idgr15=$row['groupID'];
              $query15 = "SELECT * FROM joingroup WHERE UserID='$id'AND GroupID='$idgr15'";
              $results15 = mysqli_query($db, $query15);
              if(mysqli_num_rows($results15) !=0) {
               $val3=1;
              } else {
              $val3=0;
              }
              if ($val3==0){
              echo'<p>
              <form action="groupepage.php?idg='.$row[groupID].'" method="post">
              <button type="submit" name="rejoindre" id="rejoindre" value="'.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">Rejoindre Group</button>
                </form>
              </p>
            </div>
            <div class="clearfix"></div>
              ';}
              else {
                echo '<p><div class="clearfix"></div>
                <a href="groupepage.php?idg='.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">visite</a>
                <p></div>
                <div class="clearfix"></div></p>';
              }
              ;}?>
              
              
            </div>
          </div>

          <div class="col-md">
            <div class="groups">
            <h2 class="">S6:</h2>
            <?php  
            $query = "SELECT * FROM Groups Where Fillier='$fillier' AND Semestre='S6'";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo '
              <div class="group-item">
              <img src="Img/group.png" alt="">
              <h4 class="text-muted"><a href="groupepage.php?idg='.$row[groupID].'" class="text-muted">'.$row[Name].'</a></h4>
              <p>'.$row[Semestre].' Module.</p><h1>&nbsp;</h1>';
              $idgr15=$row['groupID'];
              $query15 = "SELECT * FROM joingroup WHERE UserID='$id'AND GroupID='$idgr15'";
              $results15 = mysqli_query($db, $query15);
              if(mysqli_num_rows($results15) !=0) {
               $val3=1;
              } else {
              $val3=0;
              }
              if ($val3==0){
              echo'<p>
              <form action="groupepage.php?idg='.$row[groupID].'" method="post">
              <button type="submit" name="rejoindre" id="rejoindre" value="'.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">Rejoindre Group</button>
                </form>
              </p>
            </div>
            <div class="clearfix"></div>
              ';}
              else {
                echo '<p><div class="clearfix"></div>
                <a href="groupepage.php?idg='.$row[groupID].'" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">visite</a>
                <p></div>
                <div class="clearfix"></div></p>';
              }
              ;} ?>
              
              
            </div>
          </div>


          





          </div>
          </div>