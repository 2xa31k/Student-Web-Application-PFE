
<?php include('server.php') ?>
<html>
<head>
	<title>Support</title><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" type="text/css" href="CSS/support.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php  if (isset($_SESSION['email'])) : ?>
    <header>
        <ul>
            <li><a href="home"><img src="Img/Edu.svg"></a></li>
            <li><a href="home">Home</a></li>
          </ul>
    </header>
    <?php endif ?>
    <?php  if (!isset($_SESSION['email'])) : ?>
    
    <header>
        <ul>
            <li><a href="index"><img src="Img/Edu.svg"></a></li>
            <li style="float:right"><a href="sign-up">Inscription</a></li>
            <li style="float:right"><a href="sign-in">Connexion</a></li>
          </ul>
    </header>
    <?php endif ?>
	<div class="container">
		<div class="img">
			<img src="Img/support.svg">
		</div>
<div class="login-content">
			<form method="post" action="Support">
            <?php include('errors.php'); ?>
            <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3 style="color:white">
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
          </h3>
      </div>
  	<?php endif ?>
				<h2 class="title">Contacter Support:</h2>   
           		<div class="input-div one ">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Nom Complete</h5>
           		   		<input type="text" name="name" id="name" class="input" value="<?php echo $name; ?>"required>
           		   </div>
                   </div>     
                   <div class="input-div two ">
                        <div class="i">
                                <i class="fas fa-at"></i>
                        </div>
                        <div class="div">
                                <h5>Email</h5>
                                <input type="email" name="_replyto" id="_replyto" class="input" value="<?php echo $_replyto; ?>" required>
                    </div>
           		</div>
                   <div class="input-div three ">
                    <div class="i">
                        <i class="far fa-id-badge"></i>
                    </div>
                    <div class="div">
                            <h5>Apogee</h5>
                            <input type="text" name="apogee" id="apogee" pattern="[0-9]{8}" class="input" value="<?php echo $apogee; ?>"required>
                </div>
               </div>
               <div class="input-div four ">
                    <div class="i">
                        <i class="far fa-sticky-note"></i>
                    </div>
                    <div class="div-text">
                            <h5>Message</h5>
                            <textarea id="subject" required="" class="input" name="message" style="height:100px"></textarea>  
                </div>
               </div>
              <br>
            	<input type="submit" class="btn" name="support" value="Envoyer  ">
            </form>
        </div>