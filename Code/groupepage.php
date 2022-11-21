<!-- verification sign-in-->
<?php 
  session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }
?>
<?php error_reporting(0);?>
<?php $ido = $_GET['idg'];?>
<?php require('server.php');?>
<?php require('logininfo.php');?>
<?php include('quitter.php') ?>
<?php require('checkjoin.php') ?>
<?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
$checkgr=0;
              $query = "SELECT * FROM Groups Where groupID='$ido' LIMIT 1";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
                $checkgr=1;
                $groupname=$row[Name];
                $groupsem=$row[Semestre];} ?>
<head>
<meta charset="utf-8"><link rel="icon" href="Img/Edu.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $groupname; ?></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="Css/profile.css" rel="stylesheet">
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
              <button type="submit" name="quitter" id="quitter" value="<?php echo $ido;?>" class="btn btn-primary">Quitter Le Group</button>
                </form>
              </p>
</div>
<div class="container">

<div class="d-flex flex-row">

  <h3>Documents:</h3>
  <div class="d-flex">
  <?php  $queryfile = "SELECT * FROM fileupload Where groupID='$ido' ORDER BY RAND() LIMIT 3";
              $resultfile = $mysqli->query($queryfile);
              while($rowfile = $resultfile->fetch_array()){
                $file_name=$rowfile[file_name];
echo '<div class="p-3">
<div class="p-2"><i class="fa fa-file fa-2x" aria-hidden="true"></i><a href="filesupload/'.$rowfile[file_name].'" target="_blank"><h6>'.$file_name.'</h6></a>  </div>
</div>';}
?>
  <div class="p-3">
      <div class="mt-3">
      <button type="submit" class="btn btn-primary btn-sm "data-toggle="modal" data-target="#upload">Ajouter un document</button>
     <a href="allFiles?idg=<?php echo $ido;?>&p=1"> <button type="submit" class="btn btn-primary btn-sm ">Tous les documents</button></a>
    </div> 
</div>
</div>
</div>
<h3>Derniere Questions:</h3>
         <div class="d-sm-flex" id="testR">
         <div class="mt-3">
      <button type="submit" class="btn btn-primary  btn-sm " data-toggle="modal" data-target="#Question">Ajouter une question</button>
      <a href="allquestions?idg=<?php echo $ido;?>&p=1"><button type="submit" class="btn btn-primary btn-sm ">Tous les questions</button> </a>
      </div>
      </div>
      <br>
            <div class="d-flex flex-column" id="here"> 
                  <?php  $query = "SELECT * FROM questions Where groupID='$ido' ORDER BY Time DESC LIMIT 5";
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
              echo '
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
         
                  <button class="dropdown-item" id="<?php echo $row[questionID];?>" data-toggle="modal" data-target="#Editer" name="Edi" onclick="getvalueEdit(this.id);"  type="submit">Modifier</button>
                  
                  <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
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
                  <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
                  <button class="dropdown-item" id="ReportQ" name="ReportQ" value="<?php echo $row[questionID];?>" type="submit">Signaler</button>
                  </form> 
                   <!-- Dropdown menu links -->
                 </div>
                 <?php endif ?>
                 <?php echo'
                 </h4>
                   <p>';if($row[Deleted]==0)echo "$row[question]";
                   else echo "<em>Question supprime...</em>";echo '</p>';
                   $query2 = "SELECT * FROM reponse Where questionID='$row[questionID]' ORDER BY Time DESC LIMIT 2";
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
                       echo '<div class="media rounded">';?>
                       <?php if (!empty($profileimage1)) : ?>
                         <img src="<?php echo "ImagesPrfl/".$profileimage1 ?>" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                         <?php endif ?>
                         <?php if (empty($profileimage1)) : ?>
                           <img src="Img/user.jpg" alt="name" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                         <?php endif ?>
                         <?php echo '
                       
                           <div class="media-body rounded">
                               <h4>' .$nameres.' ' .$surnameres.'<small><i> '.$row2[Time].' :</i></small>';?>
                               <?php if ($id==$idur): ?>
                                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <span class="sr-only">Toggle Dropright</span>
                               </button>
                               <div class="dropdown-menu">
                       
                                <button class="dropdown-item" id="<?php echo $row2[reponseID];?>" data-toggle="modal" data-target="#EditReponse" name="EditReponse" onclick="getvalueEditRep(this.id);"  type="submit">Modifier</button>
                                
                                <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
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
                  <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
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
               echo '<br><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Reponse" onClick="reply_click(this.id)" id="'.$row[questionID].'" name="rep" value="'.$row[questionID].'">repondu</button>
               <a href="questionpage?idg='.$ido.'&qID='.$row[questionID].'&p=1"><button type="submit" class="btn btn-primary btn-sm ">Tous les reponses</button> </a>
              </div>
              </div>'
              
              ;
            }

?>
</div>
</section>
<?php endif ?>
<?php if ($val1==0): ?>
  <p>
              <form action="groupepage.php?idg=<?php echo $ido;?>" method="post">
              <button type="submit" name="rejoindre" id="rejoindre" value="<?php echo $ido;?>" class="btn btn-primary ">Rejoindre Group</button>
                </form>
               <?php if (isset($_POST['rejoindre'])){
    $idg=$_POST["rejoindre"];
    $idu=$id;
    $query = "INSERT INTO joingroup (GroupID, UserID)
            VALUES('$idg','$idu')";
    mysqli_query($db, $query);}?>

              </p>
  <?php endif ?>
<script>
function reply_click(clicked_id)
  {
      var values = clicked_id;
      document.getElementById("repondre").value = values;
  }
    
        function getvalueEdit(clicked_id){
            
          var values = clicked_id;
            
            document.getElementById("Edit").value = values;
        }
        function getvalueEditRep(clicked_id){
            
          var values = clicked_id;
            
            document.getElementById("EditRep").value = values;
        }
        
        
</script>
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
          <h4 class="modal-title">Modifier</h4>
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




<div class="modal fade" id="Question">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('question.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter Question</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action="groupepage.php?idg=<?php echo $ido; ?>" method="post">
        <!-- question -->
        <div class="form-group">
  <label for="comment">Question:</label>
  <textarea class="form-control" rows="5" name="question" id="question"></textarea>
</div>
                
            <button type="submit" name="quest" value="<?php echo $ido; ?>" class="btn btn-primary">Ajouter</button>
  </form>
        </div>

        </div>
        </div>
        </div>



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
        <form action="groupepage.php?idg=<?php echo $ido; ?>" method="post">
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



    <div class="modal fade" id="upload">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('uploadfiles.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter Document</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="groupepage.php?idg=<?php echo $ido; ?>" method="post" enctype="multipart/form-data">
        <!-- question -->
        <div class="form-group">
  <label for="comment">upload:</label>
  <input type="file" class="form-control-file border" name="uploadfile">
</div>
                
            <button type="submit" id="upload" name="upload" class="btn btn-primary">upload</button>
  </form>
        </div>


        </div>
        </div>
        </div>



        <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>