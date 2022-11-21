<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idgr = $question = "";
if (isset($_POST['quest'])){
      $idgr=$_POST['quest'];
    $question= mysqli_real_escape_string($db, $_POST['question']);
    $query = "INSERT INTO questions (UserID, groupID, question,Time,authorTimeVisite) 
            VALUES('$id','$idgr','$question',CURRENT_TIME(),CURRENT_TIME())";
      mysqli_query($db, $query);
      

      }
?>