<?php
require('server.php');
require('logininfo.php');
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$que = $Editque = "";
if (isset($_POST['Edit'])){
    $que=$_POST["Edit"];
    $Editque=$_POST["ED"];
    $queryedit = "UPDATE questions SET question='".addslashes($Editque)."' WHERE questionID=$que";
      mysqli_query($db, $queryedit);
      echo "<meta http-equiv='refresh' content='0'>";
      }
      if (isset($_POST['EditRep'])){
        $rep=$_POST["EditRep"];
        $Editrep=$_POST["EDRep"];
        $queryedit = "UPDATE reponse SET reponse='".addslashes($Editrep)."' WHERE reponseID=$rep";
          mysqli_query($db, $queryedit);
          echo "<meta http-equiv='refresh' content='0'>";
          }
?>