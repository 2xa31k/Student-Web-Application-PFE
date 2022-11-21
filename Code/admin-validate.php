<?php
// connect to the database
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
if (isset($_POST['login'])) {
	$admin = mysqli_real_escape_string($db, $_POST['adminname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
        $password = md5($password);
        $query = "SELECT * FROM admins WHERE admin='$admin' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            echo $password,$admin;
          $_SESSION['admin'] = $admin;
          $_SESSION['success'] = "You are now logged in";
          header('location: admin-home.php');
        }
    
  
	
}

?>
