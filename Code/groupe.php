<!-- verification sign-in-->
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
    <title>Groupes</title>
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
    <section>
      <div class="container">
        <div class="row">
        <div class="col-md-4">
            
            <div class="panel panel-default groups">
              <div class="">
                <h3 class="">Votre Groupes:</h3>
              </div>
              <?php if ($val2==0): ?>
              <div class="panel-body">
                <h4 class="text-danger">aucun groupe.</h4>
            </div>
            <?php endif ?>
            <?php if ($val2==1): ?>
              <?php
              $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query10 = "SELECT * FROM joingroup Where UserID='$id' ORDER BY RAND() LIMIT 3";
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
            </div>'
              ;};}
?>
              <div class="clearfix"></div>
                <a href="owngroupes" class="btn btn-primary" style="background-color:#9ACCDF;color:black;">Voir vos groupes</a>
              
              <?php endif ?>
          </div>
          </div>
          <div class="col-md-8">
            <div class="groups">
              <h1 class="page-header">Groups</h1>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query = "SELECT * FROM Groups Where Fillier='$fillier' ORDER BY RAND() LIMIT 3";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo '
              <div class="group-item">
              <img src="Img/group.png" alt="">
              <h4 class="text-muted"><a href="groupepage.php?idg='.$row[groupID].'" class="text-muted">'.$row[Name].'</a></h4>
              <p>'.$row[Semestre].' Module.</p>';

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
              <button type="submit" name="rejoindre" id="rejoindre" value="'.$row[groupID].'" class="btn btn-primary " style="background-color:#9ACCDF;color:black;">Rejoindre Group</button>
                </form>
              </p>
            </div>
            <div class="clearfix"></div>
              ';}
              else {
                echo '<p>
                <a href="groupepage.php?idg='.$row[groupID].'" class="btn btn-primary"style="background-color:#9ACCDF;color:black;">visite</a>
                <p></div>
                <div class="clearfix"></div></p>';
              }
              ;}
?>
 <div class="clearfix"></div>
                <a href="allgroupes" class="btn btn-primary "style="background-color:#9ACCDF;color:black;">Lister tous les groupes</a>
              </div>
              
          
        </div>
      </div>
    </section>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
