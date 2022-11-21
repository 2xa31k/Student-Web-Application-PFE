<html>
    <head>
    <title>Mes Collegues</title><link rel="icon" href="Img/Edu.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="Css/profile.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        
    </style>
    </head>
    <body>
    <?php include('header.php') ?>
<?php include('logininfo.php') ?>
<?php include('updateinfo.php') ?>
<section class="container ng-scope ng-fadeInLeftShort" style="">
<!-- uiView:  -->
<div class="ng-fadeInLeftShort ng-scope" style="">
<div class="container-overlap ng-scope" style="background-color:#E9FFFF;">
  <div class="media m0 pv">
  <?php if (!empty($prflimage)) : ?>
    <div class="media-left"><a href="#"><img src="<?php echo "ImagesPrfl/".$prflimage ?>" alt="User" class="media-object img-circle thumb64"></a></div>
    <?php endif ?>
    <?php if (empty($prflimage)) : ?>
    <div class="media-left"><a href="#"><img src="Img/user.jpg" alt="User" class="media-object img-circle thumb64"></a></div>
    <?php endif ?>
    <div class="media-body media-middle">
      <h4 class="media-heading"><?php echo $name; ?> <?php echo $surname; ?></h4>
      <span class="">Etudiant du FS TETOUAN</span>
    </div>
  </div>
</div>
<div class="container mt-3">

      <div class="row">
<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Mes Collegues</strong>
                            </div>
                            <div class="row">
                            <div class="col-sm-12 col-md-6">
                            <div id="bootstrap-data-table_filter" class="dataTables_filter">
                            <label>Rechercher:<input class="form-control" id="myInput" type="text" placeholder="Rechercher.."></label>
                            </div></div></div>


                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th class="avatar">Image</th>
                                                    
                                                    <th>Nom</th>
                                                    <th>Filliere</th>
                                                    <th>Semestre</th>
                                                    <th>Section</th>
                                                    
                                        </tr>
                                    </thead>
                                    <tbody id="myList">
                                    
                                    <?php  
                                          $prflimgs="";
                                          $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
                                          $queryst = "SELECT * FROM collegues Where UserID='$id'";
                                                 $resultsSt = mysqli_query($db, $queryst);
                                                 while($rowst = $resultsSt->fetch_array()){
                                                     $colID=$rowst['CollegueID'];
                                                    $query1 = "SELECT * FROM students as s, studentinfo as si Where s.ID=si.StudentId AND s.ID='$colID'";
                                                     $results1 = mysqli_query($db, $query1);
                                                     $row1 = mysqli_fetch_array($results1);
                                             if(mysqli_num_rows($results1) == 1) {
                                                 $ids=$row1['ID'];
                                                   $names=$row1['Name'];
                                                   $surnames=$row1['Surname'];
                                                   $prflimgs=$row1['profile_image'];
                                                   $fillieres=$row1['Filliere'];
                                                   $sections=$row1['Section'];
                                                   $semestres=$row1['Semestre'];}
                                                   echo '<tr>
                                                   
                                                   <td class="avatar">';
                                                   if(!empty($prflimgs))
                                                   echo'
                                                       <div class="round-img">
                                                           <a href="collegue?id='.$ids.'"><img class="rounded-circle" style="width:40px;height:40px" src="ImagesPrfl/'.$prflimgs.'" alt=""></a>
                                                       </div>';
                                                       else echo'
                                                       <div class="round-img">
                                                           <a href="collegue?id='.$ids.'"><img class="rounded-circle" style="width:40px;height:40px" src="Img/user.jpg" alt=""></a>
                                                       </div>';
                                                       echo'
                                                   </td>
                                                   
                                                   <td>  <span class="name">'.$names.' '.$surnames.'</span> </td>
                                                   <td> <span class="filliere">'.$fillieres.'</span> </td>
                                                   <td><span class="semestre">'.$semestres.'</span></td>
                                                   <td>
                                                       <span class="section">'.$sections.'</span>
                                                   </td>
                                                     </tr>';
                                                   }?>
                                                   </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->


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