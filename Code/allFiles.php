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
<?php include('rejoindre.php') ?>
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
              </p>
</div>
<div class="container">
<div class="mt-3">
<button type="submit" class="btn btn-primary btn-sm "data-toggle="modal" data-target="#upload">Ajouter un document</button>
      </div>
<br>
<div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Table des documents</strong>
                            </div>
                            <div class="row">
                            <div class="col-sm-12 col-md-6">
                            <div id="bootstrap-data-table_filter" class="dataTables_filter">
                            <label><input class="form-control" id="myInput" type="text" placeholder="rechercher.."></label>
                            </div></div></div>


                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                                    <th>Nom de Fichier</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myList">
<?php  


                        $results_per_page = 10;  
  
                        //find the total number of results stored in the database  
                        $queryC = "SELECT * FROM fileupload WHERE GroupID='$ido'";  
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

$query = "SELECT * FROM fileupload Where GroupID='$ido' ORDER BY Time DESC LIMIT $page_first_result,$results_per_page";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
                ?>
               
                                    <?php  echo'
                                                  <tr>
                                                   <td><a href="filesupload/'.$row['file_name'].'"> #'.$row['file_name'].' </a></td>
                                                </tr>'
         ;
       }
?> 
</tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->

<br>
<div class="pagination">
<?php if ($p!=1): ?>
<a href="allquestions?idg=<?php echo $ido;?>&p=<?php echo $p-1;?>">&laquo;</a>
<?php endif ?>
<?php for($page = 1; $page<= $number_of_page; $page++) {  
    
    if($p==$page)
    echo '<a class="active" href="allquestions?idg='.$ido.'&p='.$page.'">'.$page.'</a>';
else echo '<a href="allquestions?idg='.$ido.'&p='.$page.'">'.$page.'</a>'; }
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
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>


<div class="modal fade" id="upload">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <?php include('uploadfiles.php');?>
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Repondu</h4>
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




</html>