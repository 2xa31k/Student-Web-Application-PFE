<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: sign-in.php');
  }

?>
<head>
	<title>Messagerie</title><link rel="icon" href="Img/Edu.svg">
	<link rel="stylesheet" type="text/css" href="CSS/Chat.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
$(document).ready(function () {
    setInterval(function () {
      $('#here').load(window.location.href + " #here");
    }, 300);
});

</script>

</head>
<body onload="scrollToBottom('here')">

<?php include('logininfo.php') ?>
<?php include('header.php') ?>
<div class="container">
  <br>
    <div class="row">
    
        <div class="conversation-wrap col-lg-4">
       <br> <input class="form-control" id="myInput" type="text" placeholder="rechercher">
       <div id="myList">
            <?php $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
                    $queryGet = "SELECT DISTINCT m.convID ,c.user1ID,c.user2ID FROM conversations as c , messages as m WHERE c.mainConvID=m.convID AND (c.user2ID='$id' OR c.user1ID='$id') ORDER BY m.Time DESC";
                    $result = $mysqli->query($queryGet);
                    while($row = $result->fetch_array()){
                        $prflimg="";
                            if($row['user1ID']==$id)
                                $iduc=$row['user2ID'];
                            else $iduc=$row['user1ID'];
                        $idcnv=$row['convID'];
                        $query1 = "SELECT * FROM students as s,studentinfo as si WHERE s.ID=si.StudentId AND s.ID='$iduc' LIMIT 1";
                        $results1 = mysqli_query($db, $query1);
                        $row1 = mysqli_fetch_array($results1);
                        if(mysqli_num_rows($results1) == 1) {
                                                   $ids=$row1['ID'];
                                                   $names=$row1['Name'];
                                                   $surnames=$row1['Surname'];
                                                   $prflimgs=$row1['profile_image'];
                  } $query2 = "SELECT * FROM messages WHERE convID='$idcnv' ORDER BY Time DESC LIMIT 1";
                  $results2 = mysqli_query($db, $query2);
                  $row2 = mysqli_fetch_array($results2);
                  if(mysqli_num_rows($results2) == 1) {
                                             $mID=$row2['messageID'];
                                             $cID=$row2['convID'];
                                             $mText1=$row2['messagetext']; 
                                             $umID=$row2['userID'];
                                             $mText = strlen($mText1) > 20 ? substr($mText1,0,20)."..." : $mText1;
                       
            } 

                  echo '<div class="media conversation" id="cnvlist">
                  <a class="pull-left" href="collegue?id='.$ids.'">';
                  if(empty($prflimgs))
                   echo'<img class=" rounded-circle media-object" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="Img/user.jpg">';
                   else echo'<img class="rounded-circle media-object" data-src="holder.js/64x64" alt="64x64" style="width: 50px; height: 50px;" src="ImagesPrfl/'.$prflimgs.'">';
                  echo '</a>
                  <div class="media-body" id="cnv">
                      <h5 class="media-heading">'.$names.' '.$surnames.'</h5><br>';
                    if($umId==$id)
                    echo  '<small>:'.$mText.'</small>';
                    else echo '<small>'.$mText.'</small>';
                    echo '
                  </div>
                  <form action="inbox?cnv='.$cID.'" method="post">
                  <button type="submit" name="show" id="show" value="'.$cID.'" class="btn"><i class="far fa-eye"></i></button>
                    </form>
              </div>';
                        
                  }?>
            
        </div></div>

        <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList #cnvlist").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

        <div class="message-wrap col-lg-8">
            <div class="msg-wrap" id="here">
              <div id="here">
            <?php 
            $cmID="";
            $cmID= $_GET['cnv'];
            if (isset($_POST['show']) OR !empty($cmID))
            {     
              
              
              if (isset($_POST['show']))
                  $conID=$_POST["show"];
              else $conID=$cmID;
              $queryGetCnv = "SELECT * FROM conversations WHERE mainConvID='$conID' ";
              $resultsGetCnv = mysqli_query($db, $queryGetCnv);
            $rowGetCnv = mysqli_fetch_array($resultsGetCnv);
            if(mysqli_num_rows($resultsGetCnv) == 1) {
             
              $iduc1=$rowGetCnv['user1ID'];
              $iduc2=$rowGetCnv['user2ID'];
            }
              if($id==$iduc1)
                {
                  $queryedit = "UPDATE conversations SET user1Visite=CURRENT_TIME() WHERE mainConvID='$conID'";
      mysqli_query($db, $queryedit);
                }
                else {
                  $queryedit = "UPDATE conversations SET user2Visite=CURRENT_TIME() WHERE mainConvID='$conID'";
                  mysqli_query($db, $queryedit);
                }
            $mysqli = new mysqli('127.0.0.1', 'root', '', 'pfe');
            $queryMs = "SELECT * FROM messages WHERE convID='$conID' ORDER BY Time ASC";
            $resultMs = $mysqli->query($queryMs);
            while($rowMs = $resultMs->fetch_array()){
                $usID=$rowMs['userID'];
                $query1 = "SELECT * FROM students as s,studentinfo as si WHERE s.ID=si.StudentId AND s.ID='$usID' LIMIT 1";
                        $results1 = mysqli_query($db, $query1);
                        $row1 = mysqli_fetch_array($results1);
                        if(mysqli_num_rows($results1) == 1) {
                                                   $ids=$row1['ID'];
                                                   $names=$row1['Name'];
                                                   $surnames=$row1['Surname'];
                                                   $prflimgs=$row1['profile_image'];
                  }

                echo '<div class="media msg ">
                <a class="pull-left" href="#">';
                if(empty($prflimgs))
                   echo'<img class=" rounded-circle media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="Img/user.jpg">';
                   else echo'<img class=" rounded-circle media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="ImagesPrfl/'.$prflimgs.'">';
                  echo'
                </a>
                <div class="media-body " style="max-width:500px;overflow-wrap: break-word;-webkit-hyphens: auto;-moz-hyphens: auto;-ms-hyphens: auto;hyphens: auto;">
                    <small class="pull-right time"><i class="fa fa-clock-o"></i>'.$rowMs['Time'].'</small>
                    <h5 class="media-heading">'.$names.' '.$surnames.'</h5>
                    <small class="col-lg-10">'.$rowMs['messagetext'].'</small>
                </div>
                
            </div>';

            }

            
            
            echo '</div></div>
            <form action="inbox?cnv='.$conID.'" method="post" >
            <div class="send-wrap ">
                        <textarea class="form-control send-message" rows="3"  name="sendmessage"placeholder="Ecrire un message..."></textarea>
            </div>
                        <div class="btn-panel">
                          <button type="submit" name="send" id="send" class="btn" style="background-color:#9ACCDF;color:black;">Envoyer le meessage</button>
                        </div>
                        </form>
                         ';
                        if(isset($_POST['send']))
                        {
                          $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
                          $message=mysqli_real_escape_string($db, $_POST["sendmessage"]);
                          if(!empty($message)){
                  $querymsg= "INSERT INTO messages (convID, userID, messagetext,Time) VALUES('$conID','$id','$message',CURRENT_TIME()) ";
                         mysqli_query($db, $querymsg);

                          }

                        }}
                      
                        ?>
                        
                        <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<script>
function scrollToBottom (id) {
   var div = document.getElementById(id);
   div.scrollTop = div.scrollHeight - div.clientHeight;
}

</script>

        
</div>
</body>