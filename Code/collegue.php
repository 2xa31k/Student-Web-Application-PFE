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
    <title>Collegue</title>
    <link rel="icon" href="Img/Edu.svg">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="Css/profile.css" rel="stylesheet">
</head>
<body>
<?php include('logininfo.php') ?>
<?php require('server.php');?>
<?php require('header.php');?>
<?php include('rejoindre.php') ?>
<?php include('quitter.php') ?>
<?php require('checkjoin.php') ?>
<?php $cid = $_GET['id'];?>
<?php if($cid==$id)
    header('location: profile.php');?>
<section class="container ng-scope ng-fadeInLeftShort" style="">

                <?php 
                $check=0;
                $checkCol=0;
                $query = "SELECT * FROM students WHERE ID='$cid'";
                $results = mysqli_query($db, $query);
                $row = mysqli_fetch_array($results);
                if(mysqli_num_rows($results) == 1) {
                    $check=1;
                    $surname10 = $row['Surname'];
                    $name10 = $row['Name'];
                    $idc=$row['ID'];
                } 
                $query10 = "SELECT * FROM studentinfo WHERE StudentId='$cid'";
                $results10 = mysqli_query($db, $query10);
                $row10 = mysqli_fetch_array($results10);
                if(mysqli_num_rows($results) == 1) {
                    $fillier10 = $row10['Filliere'];
                    $semestre10 = $row10['Semestre'];
                    $section10 = $row10['Section'];
                    $prflimage10= $row10['profile_image'];
                } 
                $query20 = "SELECT * FROM collegues WHERE CollegueID='$cid' AND UserID='$id'";
                $results20 = mysqli_query($db, $query20);
                $row20 = mysqli_fetch_array($results20);
                if(mysqli_num_rows($results20) == 1) {
                    $checkCol=1;
                } 
                
                ?>
<?php if ($check==0) : ?>
<?php header('location: 404.php');?>
<?php endif ?>
<!-- uiView:  -->
<?php if ($check==1) : ?>
<div class="ng-fadeInLeftShort ng-scope" style="">
<div class="container-overlap  ng-scope" style="background-color:#E9FFFF;">
  <div class="media m0 pv">
  <?php if (!empty($prflimage10)) : ?>
    <div class="media-left"><a href="#"><img src="<?php echo "ImagesPrfl/".$prflimage10 ?>" alt="User" class="media-object img-circle thumb64"></a></div>
    <?php endif ?>
    <?php if (empty($prflimage10)) : ?>
    <div class="media-left"><a href="#"><img src="Img/user.jpg" alt="User" class="media-object img-circle thumb64"></a></div>
    <?php endif ?>
    <div class="media-body media-middle">
      <h4 class="media-heading "><?php echo $name10; ?> <?php echo $surname10; ?></h4>
      <span class="">Etudiant du FS TETOUAN</span>

    </div>      <button type="submit" name="send" id="send" data-toggle="modal" data-target="#sendmessage" class="btn btn-primary">Envoyer Message</button>&nbsp;
    <form action="collegue.php?id=<?php echo $cid; ?>" method="post" >
                        <div class="btn-panel">
                        <?php  if ($checkCol==0) : ?>
                          <button type="submit" name="ajt" id="ajt" value="<?php echo $cid; ?>"class="btn btn-primary ">Ajouter Collegue</button>
                          <?php endif ?>
                          <?php  if ($checkCol==1) : ?>
                          <button type="submit" name="sup" id="sup" value="<?php echo $cid; ?>"class="btn btn-primary ">Supprimer Collegue</button>
                          <?php endif ?>
                          <button type="submit" name="report" id="report" value="<?php echo $cid; ?>"class="btn btn-primary ">Signaler</button>

                        </div>
                        </form>
                        <?php if (isset($_POST['report']))
{
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
  $idr=$_POST["report"];
  $querysup = "INSERT INTO reports(reporterID,typeR,typeID,Fil,Time) VALUES('$id','profile','$idr','$fillier10',CURRENT_TIME())";
mysqli_query($db, $querysup);
echo "<meta http-equiv='refresh' content='0'>";
}
  ?>
  </div>
</div> <br> <br>
<div class="container" style="background-color:#E9FFFF;">
  <div class="row">
    <!-- Left column-->
    <div class="col-md-12">
        <div class="card-body">
          <table class="table table-striped">
            <tbody>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Nom:</td>
                <td class="ng-binding"><?php echo $surname10; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Prenom:</td>
                <td class="ng-binding"><?php echo $name10; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Filliere:</td>
                <td class="ng-binding"><?php echo $fillier10; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Semestre:</td>
                <td class="ng-binding"><?php echo $semestre10; ?></td>
              </tr>
              <tr>
                <td><em class="ion-document-text icon-fw mr"></em>Section:</td>
                <td class="ng-binding"><?php echo $section10  ; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-divider"></div>
        <div class="card-offset">
          
        </div>
      </form>
    </div>
    <?php endif ?>
    <!-- Right column-->



<!-- The Modal -->

<script>
    function getvalue(){
            
            var values = document.getElementById("send").value;
            
            document.getElementById("sendMsg").value = values;
        }       
</script>
</section>
<div class="modal fade" id="sendmessage">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Message</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <?php require('logininfo.php') ?>
        <!-- Modal body -->
        <div class="modal-body">
        <form action="collegue.php?id=<?php echo $cid; ?>" method="post">
        <!-- question -->
        <div class="form-group">
  <label for="comment">Message:</label>
  <textarea class="form-control" rows="3" cols="50" name="Msg" id="Msg"></textarea>
</div>
                
            <button type="submit" id="sendMsg1" value="" name="sendMsg1" class="btn btn-primary">Send</button>
  </form>
        </div>


        </div>
        </div>
        </div>
<?php 

if (isset($_POST['sendMsg1'])){
 
  $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
$idGetCnv=0;
  $queryGetCnv = "SELECT * FROM conversations WHERE (user1ID='$id' AND user2ID='$cid' ) OR ( user2ID='$id' AND user1ID='$cid')";
  $resultsGetCnv = mysqli_query($db, $queryGetCnv);
$rowGetCnv = mysqli_fetch_array($resultsGetCnv);
if(mysqli_num_rows($resultsGetCnv) == 1) {
    $idGetCnv=$rowGetCnv['mainConvID'];
  
}
  if($idGetCnv==0){

  $querycnv = "INSERT INTO conversations (user1ID, user2ID) VALUES('$id','$cid')";
  mysqli_query($db, $querycnv);
  $queryGetCnv1 = "SELECT * FROM conversations WHERE user1ID='$id' AND user2ID='$cid'";
  $resultsGetCnv1 = mysqli_query($db, $queryGetCnv1);
  $rowGetCnv1 = mysqli_fetch_array($resultsGetCnv1);
if(mysqli_num_rows($resultsGetCnv1) == 1) {
    $idGetCnv1=$rowGetCnv1['mainConvID'];
}}else $idGetCnv1=$idGetCnv;
$message=mysqli_real_escape_string($db, $_POST["Msg"]);
 $querymsg= "INSERT INTO messages (convID, userID, messagetext,Time) VALUES('$idGetCnv1','$id','$message',CURRENT_TIME()) ";
    mysqli_query($db, $querymsg);
    }
?>


<?php require('logininfo.php');
        $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
      if (isset($_POST['ajt'])){
        $queryAjt= "INSERT INTO collegues (UserID, CollegueID) VALUES('$id','$cid') ";
    mysqli_query($db, $queryAjt);
    echo "<meta http-equiv='refresh' content='0'>";}

?>
<?php require('logininfo.php');
        $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
      if (isset($_POST['sup'])){
        $querySup= "DELETE FROM `collegues` WHERE UserID='$id' AND CollegueID='$cid'";
    mysqli_query($db, $querySup);
    echo "<meta http-equiv='refresh' content='0'>";}

?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>