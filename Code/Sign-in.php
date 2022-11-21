<?php include('server.php') ?>
<?php 
  if (isset($_SESSION['email'])) {
  	header('location: home.php');
  }
?>
<html>
<head>
	<title>Login Form</title><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" type="text/css" href="CSS/sign-in.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <ul>
            <li><a href="index"><img src="Img/Edu.svg"></a></li>
            <li style="float:right"><a href="Sign-up">Inscription</a></li>
			<li style="float:right"><a href="support">Nous Contactez</a></li>
          </ul>
    </header>
	<div class="container">
	
		<div class="img">
			<img src="Img/Edu.svg">
		</div>
		<div class="login-content">

			<form method="post" action="Sign-in">
			<?php include('errors.php'); ?>
			<?php if (isset($_SESSION['msg'])) : ?>
      <div class="error success" >
      	<h3 style="color:white">
          <?php 
          	echo $_SESSION['msg']; 
          	unset($_SESSION['msg']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
				<h2 class="title">Connexion</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" name="email" value="<?php echo $email; ?>" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Mot de passe</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
            	<a href="support.php">Informations de compte oubliées ?</a>
                <a href="Sign-up.php">Cree un compte?</a>
            	<input type="submit" class="btn" name="login" value="Authentification">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="JS/sign-in.js"></script>
</body>
</html>