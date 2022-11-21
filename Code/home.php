<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
    session_start(); 
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }

?>
<html>
    <head>
    <title>Home</title><link rel="icon" href="Img/Edu.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
$(document).ready(function () {
    setInterval(function () {
        $('#here2').load(window.location.href + " #here2");

    }, 2000);
});
</script>
    <style>
      @media screen and (max-width: 900px){
        .flip-card {display:none;}}
    .flip-card {
  background-color: transparent;
  width: 200px;
  height: 200px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: #E9FFFF;
  color: black;
  transform: rotateY(180deg);
}
    .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  text-align:center;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}
      .closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
    </style>
    </head>
    <body>
    <?php include('header.php') ?>
    <?php include('logininfo.php') ?>
    <?php include('completeprofile.php') ?>
    <?php include('updateinfo.php') ?>
    <?php require('checkjoin.php') ?>

        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3 style="color:white">
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
    <?php if($checkwarn==1){
      echo '<br><div class="alert">
      
      <span class="closebtn">&times;</span>  
      <strong>Avertissement!</strong> Tu étais prévenu.
    </div>';
      $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $querywarn = "UPDATE students SET warn=0 WHERE ID='$id'";
  mysqli_query($db, $querywarn);
    }
?>  
<div class="header">
	<h2 style="text-align:center;" >Bonjour <?php echo $name; ?> <?php echo $surname; ?></h2>
</div>


<div class="container mt-3">

        <div class="row">
             <div class="col-3">
                <div class="flip-card w3-card w3-round">
                <div class="flip-card-inner">
              <div class="flip-card-front">
             <?php if (!empty($prflimage)) : ?>
               <img src="<?php echo "ImagesPrfl/".$prflimage ?>" alt="Avatar" style="width:200px;height:200px;">
               <?php endif ?>
               <?php if (empty($prflimage)) : ?>
                 <img src="Img/user.jpg" alt="Avatar" style="width:200px;height:200px;">

               <?php endif ?>
             </div>
             <div class="flip-card-back">
                <h1><?php echo $name; ?> <?php echo $surname; ?></h1> 
                <p>Filliere:<em>&nbsp;<?php echo $fillier; ?></em></p> 
                <p>Semestre:<em>&nbsp;<?php echo $semestre; ?></em></p>
             </div>
  </div>
</div>  




                   
             
             
             
            </div>

  <div class="col-9">
  <?php if ($val2==0): ?>
    <h2>Groupes suggérés:</h2>
    <div class="d-sm-flex mb-3">
                <div class="d-sm-flex">
                <?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
              $query = "SELECT * FROM Groups Where Fillier='$fillier' ORDER BY RAND() LIMIT 3";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
              echo '
                     <div class="p-2">
                           <div class="card-body">
                                <div class="" style="width: 10rem;">
                                             <img class="card-img-top rounded-circle" src="Img/group.png" alt="Card image cap">
                                      <div class=" text-center card-deck">
                                            <p class="card-text">'.$row[Name].'</p>
                                            </div>        
                                      <div class=" text-center">
                                      <p>
                                      <form action="groupepage.php?idg='.$row[groupID].'" method="post">
                                      <button type="submit" name="rejoindre" id="rejoindre" value="'.$row[groupID].'" class="btn btn-primary bg-secondary">Rejoindre Group</button>
                                        </form>
                                      </p>
                                        </div>
                                </div>
                           </div>
                       </div>';} ?>
                       
                 </div>
                 <div class="mt-auto p-2"> <a href="groupe">Plus...</a></div>
          </div>
  <?php endif ?>
  <?php if ($val2==1): ?>
            <h2>Votre groupes:</h2>
             <div class="d-sm-flex mb-3">
                <div class="d-sm-flex">
                <?php
$mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
$query10 = "SELECT * FROM joingroup Where UserID='$id' ORDER BY RAND() LIMIT 3";
$result10 = $mysqli->query($query10);

while($row10 = $result10->fetch_array()){
  $idg10=$row10[GroupID];
  $query11 = "SELECT * FROM Groups Where groupID='$idg10' ORDER BY RAND() LIMIT 3";
$result11 = $mysqli->query($query11);

while($row11 = $result11->fetch_array()){
              echo '
                     <div class="p-2">
                           <div class="card-body">
                                <div class="" style="width: 10rem;">
                                             <img class="card-img-top rounded-circle" src="Img/group.png" alt="Card image cap">
                                      <div class=" text-center card-deck">
                                            <p class="card-text">'.$row11[Name].'</p>
                                            </div>        
                                      <div class=" text-center">
                                            <a href="groupepage.php?idg='.$row11[groupID].'" class="btn btn-primary">Visite</a>
                                        </div>
                                </div>
                           </div>
                       </div>';};} ?>
                       
                 </div>
                 <div class="mt-auto p-2"> <a href="groupe">Plus...</a></div>
          </div>
          <?php endif ?>
          <?php if ($val2==1): ?>
          <h2>Derniere Questions:</h2>
         <div class="d-sm-flex" id="here2">
            <div class="d-flex flex-column"style="min-width=900px;">
            <?php  $query = "SELECT * FROM questions WHERE EXISTS (SELECT * FROM joingroup WHERE joingroup.GroupID = questions.groupID AND joingroup.UserID = '$id') ORDER BY Time DESC LIMIT 5 ";
              $result = $mysqli->query($query);

              while($row = $result->fetch_array()){
                $idu=$row[UserID];
                $idg=$row[groupID];
                $query1 = "SELECT * FROM students WHERE ID='$idu'";
                $results1 = mysqli_query($db, $query1);
                $row1 = mysqli_fetch_array($results1);
                if(mysqli_num_rows($results1) == 1) {
                   $surname = $row1['Surname'];
                   $name = $row1['Name'];
                  } 
                  $query2 = "SELECT * FROM groups WHERE groupID='$idg' AND Fillier='$fillier'";
                $results2 = mysqli_query($db, $query2);
                $row2 = mysqli_fetch_array($results2);
                if(mysqli_num_rows($results1) == 1) {
                   $grname = $row2['Name'];
                  } 
                  $queryuser3 = "SELECT * FROM studentinfo WHERE studentID='$idu'";
                $resultsuser3 = mysqli_query($db, $queryuser3);
                $rowuser3 = mysqli_fetch_array($resultsuser3);
                if(mysqli_num_rows($resultsuser3) == 1) {
                  $profileimage3="";
                   $profileimage3 = $rowuser3['profile_image'];
                  } 
              echo '<div class="media p-4 rounded" style="background-color:#E9FFFF;">';?>
              <?php if (!empty($profileimage3)) : ?>
                <img src="<?php echo "ImagesPrfl/".$profileimage3 ?>" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <?php endif ?>
                <?php if (empty($profileimage3)) : ?>
                  <img src="Img/user.jpg" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                <?php endif ?>
                <?php echo '
             <div class="media-body" style="background-color:#E9FFFF;">
                      <h4>' .$name.' ' .$surname.' <small> de <i>'.$grname.'</i> le '.$row[Time].' </small></h4>
                      <p>';if($row[Deleted]==0)echo "$row[question]";
                      else echo "<em>Question supprime...</em>";echo '</p>';
                      $query3 = "SELECT * FROM reponse Where questionID='$row[questionID]' ORDER BY Time DESC LIMIT 1";
                      $result3 = $mysqli->query($query3);
        
                      while($row3 = $result3->fetch_array()){
                        $idur=$row3[UserId];
                        $query4 = "SELECT * FROM students WHERE ID='$idur'";
                        $results4 = mysqli_query($db, $query4);
                        $row4 = mysqli_fetch_array($results4);
                        if(mysqli_num_rows($results4) == 1) {
                           $surnameres = $row4['Surname'];
                           $nameres = $row4['Name'];
                          } 
                          $queryuser4 = "SELECT * FROM studentinfo WHERE studentID='$idur'";
                $resultsuser4 = mysqli_query($db, $queryuser4);
                $rowuser4 = mysqli_fetch_array($resultsuser4);
                if(mysqli_num_rows($resultsuser4) == 1) {
                  $profileimage4="";
                   $profileimage4 = $rowuser4['profile_image'];
                  } 
                          echo '<div class="media rounded" style="background-color:#E9FFFF;">';?>
                          <?php if (!empty($profileimage4)) : ?>
                            <img src="<?php echo "ImagesPrfl/".$profileimage4 ?>" alt="name" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                            <?php endif ?>
                            <?php if (empty($profileimage4)) : ?>
                              <img src="Img/user.jpg" alt="name" class="mr-3 mt-3 rounded-circle" style="width:45px;">
                            <?php endif ?>
                            <?php echo '
                              <div class="media-body" style="background-color:#E9FFFF;">
                                  <h4>' .$nameres.' ' .$surnameres.'<small><i>  Repondu:</i></small></h4>';
                                  if($row3[Deleted]==0)echo '<p>'.$row3[reponse].'</p>';
                               else echo '<em>response supprime...</em>';
                               echo'
                               </div>
                       </div> '
                          ;}
                echo ' </div>
             </div> <br>';}
             ?>
          <?php endif ?>



                 



            </div>
         </div>
                
     </div>    
</div>

<?php if ($val==0): ?>
    <?php include('completeprofile.php') ?>
<a class="btn" data-toggle="modal" href="#myModal"hidden>complete</a>


                 <!-- The Modal -->
                 <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">completer votre profile</h4>
          <?php include('errors.php'); ?>
			<?php if (isset($_SESSION['msg'])) : ?>
      <div class="error success" >
      	<h3 style="color:white">
          <?php 
          	echo $_SESSION['msg']; 
          	unset($_SESSION['msg']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="home.php" method="post" enctype="multipart/form-data">
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
        <div class="form-check-inline">
            <label class="form-check-label">
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
      <input type="file" name="profileImage" class="form-control-file border">
    </div>
            </div>
            <button type="submit" name="comp" class="btn btn-primary">Submit</button>
  </form>
        </div>
        


                 <script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
    $('#myModal').modal({
  backdrop: 'static',
  keyboard: false
});
</script>
<?php endif ?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
    </body>
</html>
