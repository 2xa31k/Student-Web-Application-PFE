<head>
	<title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Img/Edu.svg">

  <style>
  .nav-link{
    color:white;
  }
  #blink {
  animation: blinker 1s linear infinite;
  color:red;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
  
  </style>
  <script>
$(document).ready(function () {
    setInterval(function () {
        $('#here1').load(window.location.href + " #here1");

    }, 5500);
});
</script>
</head>
<?php error_reporting(0);?>
<?php require('server.php');?>
<?php require('logininfo.php');?>
<?php include('rejoindre.php') ?>
<?php include('quitter.php') ?>
<?php require('checkjoin.php') ?>
<body>

        <nav class="navbar navbar-expand-sm " style="background-color:#7FD3DF;">
        <a class="navbar-brand" href="home">
    <img src="Img/Edu.svg" alt="Logo" style="width:40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="home">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="groupe">Groupes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inbox">Messages</a>
      </li>
      <form class="form-inline my-1" action="search.php" methode="get" >
    <div class="md-form form-sm my-0">
      <input class="form-control form-control-sm mr-sm-2 mb-0" name="q" type="text" placeholder="Recherche"
        aria-label="Search">
    </div>
    <button class="btn btn-sm align-middle btn-outline-white" style="background-color:#D3F1F5;" type="submit">Rechercher</button>
  </form>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
    <li class="nav-item">
        <a class="nav-link" href="support">Nous Contacter</a>
      </li>
      <div id="here1">
      <li class="nav-item dropdown">
     
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <?php
          $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
          $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
          $v=0;
          $vrep=0;
          $vMs=0;
          //message notif
     
          $resultcnv= $mysqli->query("SELECT * FROM conversations WHERE (user1ID=$id OR user2ID=$id)");
          while($row = $resultcnv->fetch_array()){
            $conID=$row['mainConvID'];
                $uId=$row['user1ID'];  
                if($id==$uId){    $v=0;
                  $vMs=0;
                $queryMs = "SELECT count(messages.messageID) as total_m FROM messages join conversations WHERE messages.convID='$conID' AND messages.Time > conversations.user1Visite";
            $resultsMs = mysqli_query($db, $queryMs);
              $rowMs = mysqli_fetch_array($resultsMs);
            if(mysqli_num_rows($resultsMs) == 1) {
             $countMs = $rowMs['total_m'];
                if($countMs==1){
                   $vMs=1;
                   $v=1;}
             }
            }
           else { $v=0;
            $vMs=0;
            $queryMs = "SELECT count(messages.messageID) as total_m FROM messages join conversations WHERE messages.convID='$conID' AND messages.Time > conversations.user2Visite";
            $resultsMs = mysqli_query($db, $queryMs);
              $rowMs = mysqli_fetch_array($resultsMs);
            if(mysqli_num_rows($resultsMs) == 1) {
             $countMs = $rowMs['total_m'];
                if($countMs==1){
                   $vMs=1;
                   $v=1;}
             }
           }
          }?>
    <?php
          //reponse notif
              $queryrep = "SELECT count(reponse.reponseID) as total_rep FROM reponse join questions where reponse.questionID=questions.questionID AND reponse.Time>questions.authorTimeVisite AND questions.UserID='$id' AND reponse.UserId!='$id'";
              $resultsrep = mysqli_query($db, $queryrep);
              $rowrep = mysqli_fetch_array($resultsrep);
            if(mysqli_num_rows($resultsrep) == 1) {
             $countrep = $rowrep['total_rep'];
                if($countrep!=0){
                   $vrep=1;
                    $v=1;
                  }
             } ?>
             
             <?php if ($v==1): ?>
          <i class="fas fa-bell" id="blink" style="background-color=red;"></i>
          <?php endif ?>
          <?php if ($v==0): ?>
          <i class="fas fa-bell"></i>
          <?php endif ?>
         
        </a> 
        <div class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdownMenuLink-333">
          <?php 
          if($vrep==1){
            $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query2 = "SELECT count(reponse.reponseID) as total_rep ,reponse.groupID as grID,reponse.questionID as qID  FROM reponse join questions where reponse.questionID=questions.questionID AND reponse.Time>questions.authorTimeVisite AND questions.UserID='$id' AND reponse.UserId!='$id'";
              $result2 = $mysqli->query($query2);
              while($row2 = $result2->fetch_array()){
                $count2 = $row2['total_rep'];
                $grpID=$row2['grID'];
                $queID=$row2['qID'];
          echo ' <a class="dropdown-item" href="questionpage?idg='.$grpID.'&qID='.$queID.'&p=1" style="background-color:#E9FFFF;color:black;">Il y a '.$count2.' nouveaux reponses en votre question </a> <br>';
               }
               } 
               if($vMs==1)
               echo ' <a class="dropdown-item" href="inbox" style="background-color:#E9FFFF;color:black;">Il y a des nouveaux messages pour vous </a> <br>';
               ?>
          </div>
      </li>
      </div>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="profile">Profile</a>
          <a class="dropdown-item" href="sign-out">Deconnecter</a>
        </div>
      </li>
    </ul>
  </div>
      </nav>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <body>