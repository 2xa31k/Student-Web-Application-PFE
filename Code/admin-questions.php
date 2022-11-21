<html>
    <head>
    <title>Admin Questions</title><link rel="icon" href="Img/Edu.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
#blink {
  animation: blinker 1s linear infinite;
  color:red;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
  
.pagination a.active {
  background-color: dodgerblue;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
    </head>
    <body>
   <?php error_reporting(0); ?>
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
      </li><li class="nav-item">
        <a class="nav-link" href="admin-files">Fichiers</a>
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
$results_per_page = 15;  
  
//find the total number of results stored in the database  
$queryC = "SELECT * FROM questions join groups where questions.groupID=groups.groupID AND groups.Fillier='$F'";  
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

       <div class="d-flex flex-column"> ';?>
       <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Table de question</strong>
                            </div>
                            <div class="row">
                            <div class="col-sm-12 col-md-6">
                            <div id="bootstrap-data-table_filter" class="dataTables_filter">
                            <label><input class="form-control" id="myInput" type="text" placeholder="Rechercher.."></label>
                            </div></div></div>


                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>questionID</th>
                                            <th>question</th>
                                            <th>groupeID</th>
                                            <th>groupe-Filliere</th>
                                            <th>EtudiantID</th>
                                            <th>supprimé</th>
                                            <th>supprimer question</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myList">
                                    <?php
      $queryque = "SELECT * FROM questions join groups where questions.groupID=groups.groupID AND groups.Fillier='$filliere' ORDER BY Time DESC LIMIT $page_first_result,$results_per_page";
      $resultsque = mysqli_query($db, $queryque);
      while($rowque = $resultsque->fetch_array()){
        
          echo '<tr>
          <td>'.$rowque['questionID'].'</td>
          <td>'.$rowque['question'].'</td>
          <td>'.$rowque['groupID'].'</td>
          <td>'.$rowque['Fillier'].'</td>
          <td>'.$rowque['UserID'].'</td>
          <td>'.$rowque['Deleted'].'</td>
          <td><form action="" method="post">
          <button class="btn btn-primary bg-secondary" id="Sup" name="Sup" value="'.$rowque['questionID'].'" type="submit">Supprimer</button>
                 </form>
                 </td>

          </tr>';
         
   }
?>
</tbody>
                                </table>
                            </div>
                            <div class="pagination">
<?php if ($p!=1): ?>
<a href="admin-questions?Filliere=<?php echo $F;?>&p=<?php echo $p-1;?>">&laquo;</a>
<?php endif ?>
<?php for($page = 1; $page<= $number_of_page; $page++) {  
    
    if($p==$page)
    echo '<a class="active" href="admin-questions?Filliere='.$F.'&p='.$page.'">'.$page.'</a>';
else echo '<a href="admin-questions?Filliere='.$F.'&p='.$page.'">'.$page.'</a>'; }
 ?>
 <?php if ($p!=$number_of_page): ?>
  <a href="admin-questions?Filliere=<?php echo $F;?>&p=<?php echo $p+1;?>">&raquo;</a>
  <?php endif ?>
</div>
                        </div>
                    </div> <?php } ?>
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
  $querysup = "UPDATE questions SET Deleted=1 WHERE questionID='$idq'";
mysqli_query($db, $querysup);
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
    
</body>
</html>