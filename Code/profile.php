<!-- verification sign-in-->
<?php 
  session_start(); 
  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }
?>
</head>
<meta charset="utf-8"><link rel="icon" href="Img/Edu.svg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="Css/profile.css" rel="stylesheet">
</head>
<body>
<?php include('header.php') ?>
<?php include('logininfo.php') ?>
<?php include('updateinfo.php') ?>
<section class="container ng-scope ng-fadeInLeftShort" style="">
<!-- uiView:  -->
<div class="ng-fadeInLeftShort ng-scope rounded " >
<div class="container-overlap  ng-scope" style="background-color:#E9FFFF;">
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
<br> <br>
<div class="container" style="background-color:#E9FFFF;">
  <div class="row">
    <!-- Left column-->
    <div class="col-md-7 col-lg-8" >
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
            <?php include('updateinfo.php') ?>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Nom</td>
                <td class="ng-binding"><?php echo $surname; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Prenom</td>
                <td class="ng-binding"><?php echo $name; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Filliere</td>
                <td class="ng-binding"><?php echo $fillier; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Semestre</td>
                <td class="ng-binding"><?php echo $semestre; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Section</td>
                <td class="ng-binding"><?php echo $section  ; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-divider"></div>
        <div class="card-offset">
          <div class="card-offset-item text-right">
            <button type="button"  class="btn-raised btn btn-circle btn-lg bg-secondary" data-toggle="modal" data-target="#myModal"><em class="fa fa-edit"></em></button>
          </div>
        </div>
      </form>
    </div>
    <!-- Right column-->
    <br><br>
    <div class="col-md-5 col-lg-4">
    <br><br>
      <div class="card">
        <h5 class="card-heading">
        mes collègues
        </h5>
        <div class="mda-list">

          <?php  
                                          $prflimgs1="";
                                          $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
                                          $queryst = "SELECT * FROM collegues Where UserID='$id' LIMIT 5";
                                                 $resultsSt = mysqli_query($db, $queryst);
                                                 while($rowst = $resultsSt->fetch_array()){
                                                     $colID=$rowst['CollegueID'];
                                                    $query1 = "SELECT * FROM students as s, studentinfo as si Where s.ID=si.StudentId AND s.ID='$colID'";
                                                     $results1 = mysqli_query($db, $query1);
                                                     $row1 = mysqli_fetch_array($results1);
                                             if(mysqli_num_rows($results1) == 1) {
                                                 $ids1=$row1['ID'];
                                                   $names1=$row1['Name'];
                                                   $surnames1=$row1['Surname'];
                                                   $prflimgs1=$row1['profile_image'];
                                                   $fillieres1=$row1['Filliere'];
                                                   $sections1=$row1['Section'];
                                                   $semestres1=$row1['Semestre'];}
                                                   if(!empty($prflimgs1))
                                                   echo '<div class="mda-list-item"><img src="ImagesPrfl/'.$prflimgs1.'" alt="List user" class=" rounded-circle mda-list-item-img">';
                                                   else echo'<div class="mda-list-item"><img src="Img/user.jpg" alt="List user" class=" rounded-circle mda-list-item-img">';
                                                   echo '
                                                   <div class="mda-list-item-text mda-2-line">
                                                     <h3><a href="collegue?id='.$ids1.'">'.$names1.' '.$surnames1.'</a></h3>
                                                     <br>
                                                   </div>
                                                 </div>'; }?>


        </div>
        <div class="card-body pv0 text-right"><a href="mescollegues" class="btn btn-flat btn-info">Voir la liste</a></div>
        </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modifier le profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="profile.php" method="post" enctype="multipart/form-data">
        <!-- Semestre -->
        <div class="form-group">
            <label for="sel1">Fillier:</label>
            <select class="form-control" name="FIL" id="sel1">
             <option>SMI</option>
             <option>SMA</option>
             <option>SMP</option>
             <option>SMC</option>
             <option>SVT</option>
             <option>STU</option>
             </select>
            </div>
        <label>Semestre:</label>
        <div class="form-check-inline" required>
            <label class="form-check-label" required>
                <input type="checkbox"  name="sem[]" "class="form-check-input" value="S2">S2
            </label>
            </div>
              <div class="form-check-inline">
                 <label class="form-check-label">
                        <input type="checkbox" name="sem[]" class="form-check-input" value="S4">S4
                </label>
                </div>
             <div class="form-check-inline">
                <label class="form-check-label">
                     <input type="checkbox" name="sem[]" class="form-check-input" value="S6">S6
                 </label>
            </div>
            <br>
            <!-- Section -->
            <label>Section:   </label>
            <div class="form-check-inline">
                 <label class="form-check-label" for="radio1">
                      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="A" checked>A
                 </label>
             </div>
            <div class="form-check-inline">
             <label class="form-check-label" for="radio2">
               <input type="radio" class="form-check-input" id="radio2" name="optradio" value="B">B
             </label>
         </div>
             <div class="form-check-inline">
                 <label class="form-check-label" for="radio2">
                  <input type="radio" class="form-check-input" id="radio2" name="optradio" value="C">C
             </div>
             <div class="form-check-inline">
                  <label class="form-check-label" for="radio2">
                  <input type="radio" class="form-check-input" id="radio2" name="optradio" value="D">D
                </label>
                </div>
                <br>
                <label>Change votre photo:</label>
                <div class="form-group">
      <input type="file" class="form-control-file border" name="profileImage">
    </div>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

</section>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>