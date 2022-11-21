<?php include('server.php') ?>
<?php 
  if (isset($_SESSION['email'])) {
  	header('location: home.php');
  }
?>
<head>
	<title>FS Portal</title><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" type="text/css" href="CSS/index.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container"></div>
    <div class="nav">
        <ul>
            <li><a href="#"><img src="Img/Edu.svg"></a></li>
            <li style="float:right"><a href="Sign-up">Inscription</a></li>
            <li style="float:right"><a href="Sign-in">Connexion</a></li>
            <li style="float:right"><a href="support">Nous Contactez</a></li>
          </ul>
        </div>
        <br><br><br>
        <h1 style="text-align:center"><strong>Site Web pour les etudiant de fs tetouan</strong></h1>
        <div class="img" style="width:100%;height:400px;">
            <img src="Img/Edu.svg" alt="Image" style="float:left;width:100%;height:100%;">
            <div class="text"><p>Ceci est un site Web pour partager des documents, des informations et demander de l'aide à d'autres pour les étudiants de FS Tetouan</p></div>
    <div class="Forms">
    <ul>
        <li><a href="Sign-in"><i class="fas fa-sign-in-alt"></i>Connexion</a></li>
        <li><a href="Sign-up"><i class="fas fa-user-plus"></i>Inscription</a></li>
    </ul>
    </div>
</body>