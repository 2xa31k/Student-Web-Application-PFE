<?php include('server.php') ?>
<?php 
  if (isset($_SESSION['email'])) {
    $_SESSION['success'] = "You are already logged in";
  	header('location: home.php');
  }

?>
<html>
<head>
	<title>SignUp</title><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" type="text/css" href="CSS/sign-up.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <header>
        <ul>
            <li><a href="index"><img src="Img/Edu.svg"></a></li>
            <li style="float:right"><a href="Sign-in">Connexion</a></li>
            <li style="float:right"><a href="support">Nous Contactez</a></li>
          </ul>
    </header>
	<div class="container">
		<div class="img">
			<img src="Img/SignUP.svg">
		</div>
		<div class="login-content">
			<form method="post" action="Sign-up">
            <?php include('errors.php'); ?>
				<h2 class="title">S’inscrire</h2>   
           		<div class="input-div one ">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Prenom</h5>
           		   		<input type="text" name="name" id="name" class="input" value="<?php echo $name1; ?>" required>
           		   </div>
                   </div>    
                   <div class="input-div two ">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nom</h5>
           		   		<input type="text" name="surname" id="surname" class="input" value="<?php echo $surname; ?>"required>
           		   </div>
                   </div>  
                   <div class="input-div three ">
                        <div class="i">
                                <i class="fas fa-at"></i>
                        </div>
                        <div class="div">
                                <h5>Email</h5>
                                <input type="email" name="email" id="email" class="input" value="<?php echo $email; ?>" required>
                    </div>
           		</div>
                   <div class="input-div four ">
                    <div class="i">
                        <i class="far fa-id-badge"></i>
                    </div>
                    <div class="div">
                            <h5>Apogee</h5>
                            <input type="text" name="apogee" id="apogee" pattern="[0-9]{8}" class="input" value="<?php echo $apogee; ?>"required>
                </div>
               </div>
           		<div class="input-div pass ">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                    <div class="div">
                        <h5>Mot de passe</h5>
                        <input type="password" name="password1" id="password" class="input" required>
                    </div>
            	</div>
                <div class="input-div pass ">
                    <div class="i"> 
                         <i class="fas fa-lock"></i>
                    </div>
                  <div class="div">
                      <h5>Mot de passe</h5>
                      <input type="password" name="password2" id="confirm_password" class="input" required>
                  </div>
              </div>
              <br>
                <a href="Sign-in">Se connecter à un compte existant</a>
                <a href="Support">Des problèmes?</a>
            	<input type="submit" class="btn" name="SignUp" value="s'inscrire">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="JS/sign-up.js"></script>
</body>
</html>