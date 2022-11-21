<?php
session_start();
// initializing variables
$name="";
$name1="";
$surname="";
$email="";
$apogee="";
$password1="";
$password2="";
$id="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');

// REGISTER USER
if (isset($_POST['SignUp'])) {
  if (isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['apogee'])&&isset($_POST['email'])&&isset($_POST['password1'])&&isset($_POST['password2'])){
  // receive all input values from the form
  $name1 = mysqli_real_escape_string($db, $_POST['name']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $apogee = mysqli_real_escape_string($db, $_POST['apogee']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name1) ||empty($surname)||empty($apogee)|| empty($email)||empty($password1)) { array_push($errors, "toutes les entrées sont nécessaires"); }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Email non valide"); }
  if(strlen($apogee)!=8){
    array_push($errors, "Apogee non valide doit être composé de 8 chiffres");
    }
  if(!preg_match('/^[0-9]*$/', $apogee))
  {
    array_push($errors, "Apogee invalide, uniquement des chiffres");
  }
  if ($password1 != $password2) {
	array_push($errors, "les deux mots de passe ne correspondent pas");
  }
  else if(strlen($password1)<8){
	array_push($errors, "le mot de passe doit comporter plus de 8 caractères");
  }
  
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM students WHERE Email='$email' OR Apogee='$apogee' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Apogee'] === $apogee) {
      array_push($errors, "Apogée existe déjà");
    }
    if ($user['Email'] === $email) {
      array_push($errors, "Email existe déjà");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password1);//encrypt the password before saving in the database

  	$query = "INSERT INTO students (name,surname, Apogee, Email, Password) 
  			  VALUES('$name1','$surname','$apogee','$email', '$password')";
  	mysqli_query($db, $query);
    $query0 = "SELECT * FROM students WHERE email='$email'";
    $results = mysqli_query($db, $query0);
    $row = mysqli_fetch_array($results);
      if(mysqli_num_rows($results) == 1) {
         $id=$row['ID'];
         $query1 = "INSERT INTO studentinfo (StudentId) VALUES('$id')";
          $results = mysqli_query($db, $query1);
      }
  	$_SESSION['surname'] = $surname;
  	$_SESSION['success'] = "You are now registred";
  	header('location: sign-in.php');  
  }
}else array_push($errors, "all fields required");
}
//login page
if (isset($_POST['login'])) {
  $em="";
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM students WHERE Email='$email' AND Password='$password'";
        $results = mysqli_query($db, $query);
        $row = mysqli_fetch_array($results);
          if($row['ban']==1)
          array_push($errors, "vous êtes banni du site contactez le support pour plus d'informations");
          else {
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $em=$_SESSION['email'];
          $usern = "SELECT surname FROM students WHERE Email='$em'";
          $user = mysqli_query($db, $usern);
          while ($row = mysqli_fetch_array($user)) {
            $_SESSION['surname'] = $row['name'];
      }
          $_SESSION['success'] = "You are now logged in";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong Email/Password combination");
        }
    }}
  }
  //support
  $message="";
  $name="";
  $_replyto="";
  if (isset($_POST['support'])) {
    $name = $_POST['name']; 
    $_replyto = $_POST['_replyto'];
    $message = $_POST['message'];
    $apogee=$_POST['apogee'];
    if (empty($name) ||empty($apogee)|| empty($_replyto)||empty($message)) { array_push($errors, "all inputs are required"); }
    if (!filter_var($_replyto, FILTER_VALIDATE_EMAIL)) { array_push($errors, "Email not valid"); }
  if(strlen($apogee)!=8){
    array_push($errors, "Invalid Apogee must be 8 numbers");
    }
  if(!preg_match('/^[0-9]*$/', $apogee))
  {
    array_push($errors, "Invalid Apogee only numbers");
  }
  if(count($errors) == 0) {
    $_SESSION['success']='message envoyer'; 
          
  }
  }
 
  ?>
