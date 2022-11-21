<?php include('admin-validate.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8"><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="CSS/admin-logincss.css">
	<title>Login Page</title>
</head>

<body>
	<form action="admin-login.php" method="post">
    <?php include('admin-validate.php') ?>
		<div class="login-box">
			<h1>Connexion</h1>

			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Nom Utilisateur"
						name="adminname" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Mot De Passe"
						name="password" value="">
			</div>

			<input class="button" type="submit"
					name="login" value="Authentifier">
		</div>
	</form>
</body>

</html>
