<?php 
  session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }
?>

<?php error_reporting(0);?>
<?php $ido = $_GET['idg'];?>
<?php $qID = $_GET['qID'];?>
<?php require('server.php');?>
<?php require('logininfo.php');?>
<?php include('rejoindre.php') ?>
<?php include('quitter.php') ?>
<?php require('checkjoin.php') ?>
<?php

$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$queryq = "SELECT * FROM questions Where questionID='$qID'";
$resultq = mysqli_query($db, $queryq);
$rowq = mysqli_fetch_array($resultq);
if(mysqli_num_rows($resultq) == 1) {
$userIDq = $rowq['UserID'];}
if($userIDq==$id){
$querysup = "UPDATE questions SET authorTimeVisite=CURRENT_TIME() WHERE UserID='$userIDq' AND questionID='$qID'";
mysqli_query($db, $querysup);
}

?>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
$checkgr=0;
              $query = "SELECT * FROM Groups Where groupID='$ido' LIMIT 1";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
                $checkgr=1;
                $groupname=$row[Name];
                $groupsem=$row[Semestre];} ?>
<html>
<head>
<meta charset="utf-8"><link rel="icon" href="Img/Edu.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $groupname; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="Css/questions.css" rel="stylesheet">
<script>
$(document).ready(function () {
    setInterval(function () {
        $('#here').load(window.location.href + " #here");

    }, 2000);
});
</script>
</head>
<body>
<?php include('header.php');
error_reporting(0);?>
<?php include('groupbanner.php'); ?>
<?php if ($val1==1): ?>
  <p>
              <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
              <button type="submit" name="quitter" id="quitter" value="<?php echo $ido;?>" class="btn btn-primary bg-dark">Quitter Le Group</button>
                </form>
              </p></div>
<div class="container-fluid">

<br>
<?php  


                        $results_per_page = 10;  
  
                        //find the total number of results stored in the database  
                        $queryC = "SELECT * FROM questions WHERE groupID='$ido'";  
                        $resultC = mysqli_query($db, $queryC);  
                        $number_of_result = mysqli_num_rows($resultC);  

                        $number_of_page = ceil ($number_of_result / $results_per_page);  
                        $p="";
                        $p=$_GET['p'];
                        if (empty($_GET['p']) ) {  
                            $p = 1;  
                        } else {  
                            $p=$_GET['p']; 
                        }  
                        $page_first_result = ($p-1) * $results_per_page;

$query = "SELECT * FROM questions Where questionID='$qID'";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
                $idu=$row[UserID];
                $query1 = "SELECT * FROM students WHERE ID='$idu'";
                $results1 = mysqli_query($db, $query1);
                $row1 = mysqli_fetch_array($results1);
                if(mysqli_num_rows($results1) == 1) {
                   $surname1 = $row1['Surname'];
                   $name1 = $row1['Name'];
                  } 
                  
                  $queryuser = "SELECT * FROM studentinfo WHERE studentID='$idu'";
                $resultsuser = mysqli_query($db, $queryuser);
                $rowuser = mysqli_fetch_array($resultsuser);
                if(mysqli_num_rows($resultsuser) == 1) {
                  $profileimage="";
                   $profileimage = $rowuser['profile_image'];
                  } 
                  echo '<div class="container-fluid">
              <div class="media p-3 rounded" style="background-color:#E9FFFF;">';?>
              <?php if (!empty($profileimage)) : ?>
                <img src="<?php echo "ImagesPrfl/".$profileimage ?>" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <?php endif ?>
                <?php if (empty($profileimage)) : ?>
                  <img src="Img/user.jpg" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <?php endif ?>
                <?php echo '
              
              <div class="media-body" style="background-color:#E9FFFF;">
                   <h4>' .$name1.' ' .$surname1.' <small><i> le '.$row[Time].' </i></small>';?>
                   <?php if ($id==$idu): ?>
                  <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="sr-only">Toggle Dropright</span>
                 </button>
                 <div class="dropdown-menu">
         
                  <button class="dropdown-item" id="Edi" data-toggle="modal" data-target="#Editer" name="Edi" onclick="getvalueEdit();" value="<?php echo $row[questionID];?>" type="submit">Modifier</button>
                  
                  <form action="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p;?>" method="post">
                  <button class="dropdown-item" id="Sup" name="Sup" value="<?php echo $row[questionID];?>" type="submit">Supprimer</button>
                  </form> 
                   <!-- Dropdown menu links -->
                 </div>
                 <?php endif ?>
                 <?php if ($id!=$idu): ?>
                  <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="sr-only">Toggle Dropright</span>
                 </button>
                 <div class="dropdown-menu">                  
                  <form action="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p;?>" method="post">
                  <button class="dropdown-item" id="ReportQ" name="ReportQ" value="<?php echo $row[questionID];?>" type="submit">Signaler</button>
                  </form> 
                   <!-- Dropdown menu links -->
                 </div>
                 <?php endif ?>
                 <?php echo'
                 </h4>
                   <p>';if($row[Deleted]==0)echo "$row[question]";
                   else echo "<em>Question supprime...</em>";echo '</p><div id="here"';
                $query2 = "SELECT * FROM reponse Where questionID='$row[questionID]' ORDER BY Time DESC LIMIT $page_first_result,$results_per_page";
                   $result2 = $mysqli->query($query2);
     
                   while($row2 = $result2->fetch_array()){
                     $idur=$row2[UserId];
                     $query3 = "SELECT * FROM students WHERE ID='$idur'";
                     $results3 = mysqli_query($db, $query3);
                     $row3 = mysqli_fetch_array($results3);
                     if(mysqli_num_rows($results1) == 1) {
                        $surnameres = $row3['Surname'];
                        $nameres = $row3['Name'];
                       } 
                       $queryuser1 = "SELECT * FROM studentinfo WHERE studentID='$idur'";
                $resultsuser1 = mysqli_query($db, $queryuser1);
                $rowuser1 = mysqli_fetch_array($resultsuser1);
                if(mysqli_num_rows($resultsuser) == 1) {
                  $profileimage1="";
                   $profileimage1 = $rowuser1['profile_image'];
                  }
                  echo '<div class="media rounded" style="background-color:white;">';?>
                  <?php if (!empty($profileimage1)) : ?>
                    <img src="<?php echo "ImagesPrfl/".$profileimage1 ?>" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <?php endif ?>
                    <?php if (empty($profileimage1)) : ?>
                      <img src="Img/user.jpg" alt="name" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                    <?php endif ?>
                    <?php echo '
                  
                      <div class="media-body rounded" style="background-color:white;">
                          <h4>' .$nameres.' ' .$surnameres.'<small><i> '.$row2[Time].' :</i></small>';?>
                          <?php if ($id==$idur): ?>
                           <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropright</span>
                          </button>
                          <div class="dropdown-menu">
                  
                           <button class="dropdown-item" id="EdiRep" data-toggle="modal" data-target="#EditReponse" name="EditReponse" onclick="getvalueEditRep();" value="<?php echo $row2[reponseID];?>" type="submit">Modifier</button>
                           
                           <form action="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p;?>" method="post">
                           <button class="dropdown-item" id="SupRep" name="SupRep" value="<?php echo $row2[reponseID];?>" type="submit">Supprimer</button>
                           </form> 
                            <!-- Dropdown menu links -->
                          </div>
                          <?php endif ?>
                          <?php if ($id!=$idur): ?>
                  <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="sr-only">Toggle Dropright</span>
                 </button>
                 <div class="dropdown-menu">                  
                  <form action="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p;?>" method="post">
                  <button class="dropdown-item" id="ReportR" name="ReportR" value="<?php echo $row2[reponseID];?>" type="submit">Signaler</button>
                  </form> 
                   <!-- Dropdown menu links -->
                 </div>
                 <?php endif ?>
                          <?php echo '</h4>
                          <p>';if($row2[Deleted]==0)echo "$row2[reponse]";
                          else echo '<em>response supprime...</em>';echo '</p>
                       </div>
               </div> '
                  ;}
          echo '<br><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Reponse" id="rep" name="rep" onclick="getvalue();" value="'.$row[questionID].'">repondu</button>
         </div>
         </div>'
         
         ;
       }

?> 

<br>
<div class="pagination">
<?php if ($p!=1): ?>
<a href="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p-1;?>">&laquo;</a>
<?php endif ?>
<?php for($page = 1; $page<= $number_of_page; $page++) {  
    
    if($p==$page)
    echo '<a class="active" href="questionpage?idg='.$ido.'&qID='.$qID.'&p='.$page.'">'.$page.'</a>';
else echo '<a href="questionpage?idg='.$ido.'&qID='.$qID.'&p='.$page.'">'.$page.'</a>'; }
 ?>
 <?php if ($p!=$number_of_page): ?>
  <a href="allquestions?idg=<?php echo $ido;?>&p=<?php echo $p+1;?>">&raquo;</a>
  <?php endif ?>
</div>
<div>
<?php endif ?>
<?php if ($val1==0): ?>
  <p>
              <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
              <button type="submit" name="rejoindre" id="rejoindre" value="<?php echo $ido;?>" class="btn btn-primary bg-dark">Rejoindre Group</button>
                </form>
              </p>
  <?php endif ?>
  </div>
  <?php if (isset($_POST['ReportQ']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idr=$_POST["ReportQ"];
  $querysup = "INSERT INTO reports(reporterID,typeR,typeID,Fil,Time) VALUES('$id','Question','$idr','$fillier',CURRENT_TIME())";
mysqli_query($db, $querysup);
echo "<meta http-equiv='refresh' content='0'>";
}
  ?>
  <?php if (isset($_POST['ReportR']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idr=$_POST["ReportR"];
  $querysup = "INSERT INTO reports(reporterID,typeR,typeID,Fil,Time) VALUES('$id','Reponse','$idr','$fillier',CURRENT_TIME())";
mysqli_query($db, $querysup);
echo "<meta http-equiv='refresh' content='0'>";
}
  ?>
  <script>
    function getvalue(){
            
            var values = document.getElementById("rep").value;
            
            document.getElementById("repondre").value = values;
        }
        function getvalueEdit(){
            
            var valueEdit = document.getElementById("Edi").value;
            
            document.getElementById("Edit").value = valueEdit;
        }
        function getvalueEditRep(){
            
            var valueEditrep = document.getElementById("EdiRep").value;
            
            document.getElementById("EditRep").value = valueEditrep;
        }
        
        
</script>
</body>






<div class="modal fade" id="Reponse">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('reponse.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Repondu</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="questionpage?idg=<?php echo $ido;?>&qID=<?php echo $qID;?>&p=<?php echo $p;?>" method="post">
        <!-- question -->
        <div class="form-group">
  <label for="comment">Reponse:</label>
  <textarea class="form-control" rows="5" name="reponse" id="reponse"></textarea>
</div>
                
            <button type="submit" id="repondre" value="" name="repondre" class="btn btn-primary">Repondu</button>
  </form>
        </div>


        </div>
        </div>
        </div>
<?php if (isset($_POST['Sup']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idq=$_POST["Sup"];
  $querysup = "UPDATE questions SET Deleted=1 WHERE questionID='$idq'";
mysqli_query($db, $querysup);
echo "<meta http-equiv='refresh' content='0'>";
}
  ?>
  <?php if (isset($_POST['SupRep']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idrep=$_POST["SupRep"];
  $queryrepsup = "UPDATE reponse SET Deleted=1
WHERE reponseID = $idrep";
mysqli_query($db, $queryrepsup);
echo "<meta http-equiv='refresh' content='0'>";
}
  ?>
    <div class="modal fade" id="Editer">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('editer.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="groupepage.php?idg=<?php echo $ido; ?>" method="post">
        <!-- question -->
        <div class="form-group">
  <label for="comment">Edit:</label>
  <textarea class="form-control" rows="3" name="ED" id="ED"></textarea>
</div>
                
            <button type="submit" id="Edit" value="" name="Edit" class="btn btn-primary">Modifier</button>
  </form>
        </div>


        </div>
        </div>
        </div>



        <div class="modal fade" id="EditReponse">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('editer.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modifier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="groupepage.php?idg=<?php echo $ido; ?>" method="post">
        <!-- question -->
        <div class="form-group">
  <label for="comment">Edit:</label>
  <textarea class="form-control" rows="3" name="EDRep" id="EDRep"></textarea>
</div>
                
            <button type="submit" id="EditRep" value="" name="EditRep" class="btn btn-primary">Modifier</button>
  </form>
        </div>


        </div>
        </div>
        </div>

</html>