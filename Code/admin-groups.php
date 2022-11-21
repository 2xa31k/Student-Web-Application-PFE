<html>
    <head>
    <title>Admin Groups</title><link rel="icon" href="Img/Edu.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <style>
        body{
            background-color:#A9A9A9;
        }
        .pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: dodgerblue;
  color: white;
}
#blink {
  animation: blinker 1s linear infinite;
  color:red;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
  
.pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
    </head>
    <body>
    <?php error_reporting(0);?>
    <script>
$(document).ready(function () {
    setInterval(function () {
        $('#here1').load(window.location.href + " #here1");

    }, 5500);
});
</script>
    </head>
    <body><?php 
error_reporting(0);?>
    <div class="pos-f-t">
    <nav class="navbar navbar-expand-sm " style="background-color:#7FD3DF;">
        <a class="navbar-brand" href="admin-home">
    <img src="Img/Edu.svg" alt="Logo" style="width:40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="admin-home">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-students">Etudiants</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-groups">Groupes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-questions">Questions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-reponses">Reponses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin-reports">Reports</a>
      </li>
    </ul>
    <?php $v=0;
          $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
              $queryrep = "SELECT count(reports.reportID) as total_rep FROM reports join admins where reports.Time>admins.timeVisite AND admins.adminID=1";
              $resultsrep = mysqli_query($db, $queryrep);
              $rowrep = mysqli_fetch_array($resultsrep);
            if(mysqli_num_rows($resultsrep) == 1) {
             $countrep = $rowrep['total_rep'];
              if($countrep!=0)
                $v=1;
             } ?>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
      <?php if ($v==1): ?>
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"  id="blink" style="background-color=red;"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdownMenuLink-333">
         <?php echo ' <a class="dropdown-item" href="admin-reports" style="background-color:blue;color:white;">Il y a '.$countrep.' nouveaux rapports que vous n \'avez pas vus </a> <br>'; ?>
        </div>
        <?php endif ?>
        <?php if ($v==0): ?>
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdownMenuLink-333">
        </div>
        <?php endif ?>
      </li>
    </ul>
  </div>
      </nav>
</div>
<div class="container mt-3">
<form method="GET" action="">
Choisir une filliere
  <select name="Filliere" class="custom-select mb-6" onchange="this.form.submit()">
    <option value="" disabled selected>Choisir Filliere</option>
    <option value="SMI">SMI</option>
    <option value="SMA">SMA</option>
    <option value="SMP">SMP</option>
    <option value="SMC">SMC</option>
    <option value="SVT">SVT</option>
    <option value="STU">STU</option>
  </select>
</form>
<?php
$F=$_GET["Filliere"];
$db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$results_per_page = 7;  
  
//find the total number of results stored in the database  
$queryC = "SELECT * FROM groups WHERE Fillier='$F'";  
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
$filliere="";
   if(isset($_GET["Filliere"])){
     $F=$_GET["Filliere"];
     
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
       $filliere=$_GET["Filliere"];
       echo '<div class="row">
       <label> <h3>Filliere:'.$filliere.'</h3></label></div>
                <button class="btn btn-primary bg-secondary" data-toggle="modal" data-target="#myModal" id="creer" name="creer" type="submit">Cree un groupe</button>
'; }?>



<div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">groupe Table</strong>
                            </div>
                            <div class="row">
                            <div class="col-sm-12 col-md-6">
                            <div id="bootstrap-data-table_filter" class="dataTables_filter">
                            <label>Search:<input class="form-control" id="myInput" type="text" placeholder="Search.."></label>
                            </div></div></div>


                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Semestre</th>
                                            <th>Supprimer</th>
                                            <th>Editer</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myList">
                                       
                                        <?php
              $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query = "SELECT * FROM Groups Where Fillier='$filliere' ORDER BY Semestre LIMIT $page_first_result,$results_per_page";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo'<tr>
              <td>'.$row['groupID'].'</td>
              <td>'.$row['Name'].'</td>
              <td>'.$row['Semestre'].'</td>
              <td><form action="" method="post">
              <button class="btn btn-primary bg-secondary" id="Sup" name="Sup" value="'.$row['groupID'].'" type="submit">Supprimer</button>
                     </form></td>
              <td><button class="btn btn-primary bg-secondary"  data-toggle="modal" data-target="#myModalEdit" id="'.$row['groupID'].'" name="Ed" value="'.$row['groupID'].'"  onclick="getvalueEdit(this.id);" type="submit">Editer</button></td>
          </tr>';}?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination">
<?php if ($p!=1): ?>
<a href="admin-groups?Filliere=<?php echo $F;?>&p=<?php echo $p-1;?>">&laquo;</a>
<?php endif ?>
<?php for($page = 1; $page<= $number_of_page; $page++) {  
    
    if($p==$page)
    echo '<a class="active" href="admin-groups?Filliere='.$F.'&p='.$page.'">'.$page.'</a>';
else echo '<a href="admin-groups?Filliere='.$F.'&p='.$page.'">'.$page.'</a>'; }
 ?>
 <?php if ($p!=$number_of_page): ?>
  <a href="admin-groups?Filliere=<?php echo $F;?>&p=<?php echo $p+1;?>">&raquo;</a>
  <?php endif ?>
</div>
</div>
                    </div><?php ?>
                        </div>
                    </div>

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

          <?php if (isset($_POST['Sup']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idq=$_POST["Sup"];
  $querysup = "DELETE FROM groups
WHERE groupID = $idq";
mysqli_query($db, $querysup);
echo "<meta http-equiv='refresh' content='0'>";
}
?>

<script>
  
  function getvalueEdit(clicked_id){
            
            var values = clicked_id;
              
              document.getElementById("Editer").value = values;
          }
</script>
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">create groupe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="admin-groups.php?Filliere=<?php echo $F?>" method="post" enctype="multipart/form-data">
        <!-- Semestre -->
        <div class="form-group">
            <label for="sel1">Fillier:</label>
            <select class="form-control" name="FIL" id="sel1">
            <option selected><?php echo $filliere?></option>
             
             </select>
            </div>
            <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">groupe Name</span>
      </div>
      <input type="text" name="groupname" class="form-control">
    </div>
            <br>
            <!-- Section -->
            <label>Semestre:   </label>
            <div class="form-check-inline">
                 <label class="form-check-label" for="radio1">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="S2" checked>S2
                 </label>
             </div>
            <div class="form-check-inline">
             <label class="form-check-label" for="radio2">
               <input type="radio" class="form-check-input" id="radio2" name="optradio" value="S4">S4
             </label>
         </div>
             <div class="form-check-inline">
                 <label class="form-check-label" for="radio2">
                  <input type="radio" class="form-check-input" id="radio3" name="optradio" value="S6">S6
             </div>
                <br>
                
            </div>
            <button type="submit" name="creategroupe1" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

</div></div>
</div>
<?php
if (isset($_POST['creategroupe1'])){
  $fillier = $_POST["FIL"];
  $name = $_POST["groupname"];
  $semestre = $_POST["optradio"]; 
    $query2 = "INSERT INTO groups (Fillier,Name,Semestre) 
            VALUES('$fillier','$name','$semestre')";
      mysqli_query($db, $query2);
      echo "<meta http-equiv='refresh' content='0'>";
} ?>


        <div class="modal" id="myModalEdit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">editer groupe</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="admin-groups.php?Filliere=<?php echo $filliere?>" method="post" enctype="multipart/form-data">
        <!-- Semestre -->
        <div class="form-group">
            <label for="sel1">Fillier:</label>
            <select class="form-control" name="FIL1" id="sel1">
            <option selected><?php echo $filliere?></option>
             </select>
            </div>
            <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">groupe Name</span>
      </div>
      <input type="text" name="groupname1" class="form-control">
    </div>
            <br>
            <!-- Section -->
            <label>Semestre:   </label>
            <div class="form-check-inline">
                 <label class="form-check-label" for="radio1">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio1" value="S2" checked>S2
                 </label>
             </div>
            <div class="form-check-inline">
             <label class="form-check-label" for="radio2">
               <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="S4">S4
             </label>
         </div>
             <div class="form-check-inline">
                 <label class="form-check-label" for="radio2">
                  <input type="radio" class="form-check-input" id="radio3" name="optradio1" value="S6">S6
             </div>
                <br>
                
            </div>
            <button type="submit" id="Editer" name="Editer" value="" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

        <?php

if (isset($_POST['Editer'])){
    $idg=$_POST['Editer'];
    $fillier1 = $_POST["FIL1"];
    $name1 =$_POST["groupname1"];
    $semestre1 = $_POST["optradio1"]; 
      $query1 = "UPDATE groups SET Name='$name1',Fillier='$fillier1',Semestre='$semestre1' WHERE groupID='$idg'";
        mysqli_query($db, $query1);
        echo "<meta http-equiv='refresh' content='0'>";
  }
?>

        <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</boy>
</html>