
<html>
    <head>
    <title>Adminstarteur</title><link rel="icon" href="Img/Edu.svg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <style>
        body{
            background-color:#E7E7E7;
            max-height:100%;
        }
        .boxshadow{
        
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
  
  </style>
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
<div class="container">
<div class="header">
	<h2 style="text-align:center;" >Panneau d'admin</h2>
</div>

    <div class="row rounded">
    <?php 
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    $query = "SELECT count(students.ID) as total_stu FROM students";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
    if(mysqli_num_rows($results) == 1) {
    $count = $row['total_stu'];} 
    ?>
    <div class="col-lg-4 col-md-6">
                        <div class="card  boxshadow">
                            <div class="card-body">
    <i class="fa fa-user" aria-hidden="true"></i>Etudiants: <?php echo $count;?>
    </div></div></div>
    <?php 
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    $query1 = "SELECT count(groupID) as total_grp FROM groups";
    $results1 = mysqli_query($db, $query1);
    $row1 = mysqli_fetch_array($results1);
    if(mysqli_num_rows($results1) == 1) {
    $count1 = $row1['total_grp'];} 
    ?>
    <div class="col-lg-4 col-md-6">
                        <div class="card  boxshadow">
                            <div class="card-body">
    <i class="fa fa-user" aria-hidden="true"></i>Groups: <?php echo $count1;?>
    </div></div></div>
    <?php 
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    $query2 = "SELECT count(questionID) as total_qst FROM questions";
    $results2 = mysqli_query($db, $query2);
    $row2 = mysqli_fetch_array($results2);
    if(mysqli_num_rows($results2) == 1) {
    $count2 = $row2['total_qst'];} 
    ?>
    <div class="col-lg-4  col-md-6">
                        <div class="card  boxshadow">
                            <div class="card-body">
    <i class="fa fa-user" aria-hidden="true"></i>Questions: <?php echo $count2;?>
    </div></div></div>
    </div>
 <br> <br> <br>
    <div class="row  boxshadow" style="background-color:white;">
  <div class="col-8">
    <h3>Questions-Fichiers:</h3>
    <div class="row">
      <div class="col-6"><h4>Questions-Reponse:</h4>
      <?php 
      date_default_timezone_set('UTC');
      //today
      $today = date( "Y-m-d", strtotime( "-2 days" ) );
      $td=strtotime($today);
      $Tday = date('l', $td);
 
      //yesterday
      $yesterday = date( "Y-m-d", strtotime( "-3 days" ) );
      $yd=strtotime($yesterday);
      $Yday = date('l', $yd);
 
      //Byesterday
      $Byesterday = date( "Y-m-d", strtotime( "-4 days" ) );
      $byd=strtotime($Byesterday);
      $bYday = date('l', $byd);
 
      //tomorrow
      $tomorrow = date( "Y-m-d", strtotime( "-1 days" ) );
      $tod=strtotime($tomorrow);
      $oTday = date('l', $tod);
    
      //atomottow
      $atomorrow = date( "Y-m-d", strtotime( "-0 days" ) );
      $atod=strtotime($atomorrow);
      $aToday = date('l', $atod);
     
               
                ?>

<?php 
//questions
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    //byesterday
    $queryC1 = "SELECT count(questionID) as total_qst_1 FROM questions WHERE Time LIKE '%$Byesterday%'  ";
    $resultsC1 = mysqli_query($db, $queryC1);
    $rowC1 = mysqli_fetch_array($resultsC1);
    if(mysqli_num_rows($resultsC1) == 1) {
    $countC1 = $rowC1['total_qst_1'];} 
    //yesterday
    $queryC2 = "SELECT count(questionID) as total_qst_2 FROM questions WHERE Time LIKE '%$yesterday%'  ";
    $resultsC2 = mysqli_query($db, $queryC2);
    $rowC2 = mysqli_fetch_array($resultsC2);
    if(mysqli_num_rows($resultsC2) == 1) {
    $countC2 = $rowC2['total_qst_2'];}
    //today
    $queryC3 = "SELECT count(questionID) as total_qst_3 FROM questions WHERE Time LIKE '%$today%'  ";
    $resultsC3 = mysqli_query($db, $queryC3);
    $rowC3 = mysqli_fetch_array($resultsC3);
    if(mysqli_num_rows($resultsC3) == 1) {
    $countC3 = $rowC3['total_qst_3'];}
    //tommorow
    $queryC4 = "SELECT count(questionID) as total_qst_4 FROM questions WHERE Time LIKE '%$tomorrow%'  ";
    $resultsC4 = mysqli_query($db, $queryC4);
    $rowC4 = mysqli_fetch_array($resultsC4);
    if(mysqli_num_rows($resultsC4) == 1) {
    $countC4 = $rowC4['total_qst_4'];}
    //atomorrow
    $queryC5 = "SELECT count(questionID) as total_qst_5 FROM questions WHERE Time LIKE '%$atomorrow%'  ";
    $resultsC5 = mysqli_query($db, $queryC5);
    $rowC5 = mysqli_fetch_array($resultsC5);
    if(mysqli_num_rows($resultsC5) == 1) {
    $countC5 = $rowC5['total_qst_5'];}
    ?>

<?php 
//reponses
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    //byesterday
    $queryR1 = "SELECT count(reponseID) as total_rep_1 FROM reponse WHERE Time LIKE '%$Byesterday%'  ";
    $resultsR1 = mysqli_query($db, $queryR1);
    $rowR1 = mysqli_fetch_array($resultsR1);
    if(mysqli_num_rows($resultsR1) == 1) {
    $countR1 = $rowR1['total_rep_1'];} 
    //yesterday
    $queryR2 = "SELECT count(reponseID) as total_rep_2 FROM reponse WHERE Time LIKE '%$yesterday%'  ";
    $resultsR2 = mysqli_query($db, $queryR2);
    $rowR2 = mysqli_fetch_array($resultsR2);
    if(mysqli_num_rows($resultsR2) == 1) {
    $countR2 = $rowR2['total_rep_2'];}
    //today
    $queryR3 = "SELECT count(reponseID) as total_rep_3 FROM reponse WHERE Time LIKE '%$today%'  ";
    $resultsR3 = mysqli_query($db, $queryR3);
    $rowR3 = mysqli_fetch_array($resultsR3);
    if(mysqli_num_rows($resultsR3) == 1) {
    $countR3 = $rowR3['total_rep_3'];}
    //tommorow
    $queryR4 = "SELECT count(reponseID) as total_rep_4 FROM reponse WHERE Time LIKE '%$tomorrow%'  ";
    $resultsR4 = mysqli_query($db, $queryR4);
    $rowR4 = mysqli_fetch_array($resultsR4);
    if(mysqli_num_rows($resultsR4) == 1) {
    $countR4 = $rowR4['total_rep_4'];}
    //atomorrow
    $queryR5 = "SELECT count(reponseID) as total_rep_5 FROM reponse WHERE Time LIKE '%$atomorrow%'  ";
    $resultsR5 = mysqli_query($db, $queryR5);
    $rowR5 = mysqli_fetch_array($resultsR5);
    if(mysqli_num_rows($resultsR5) == 1) {
    $countR5 = $rowR5['total_rep_5'];}
    ?>



      <canvas id="myChart1" style="width:1100px;height:850px;max-width:1600px"></canvas>
      
      <script>

              var xValues = ["<?php echo $bYday; ?>","<?php echo $Yday; ?>","<?php echo $Tday; ?>","<?php echo $oTday; ?>","<?php echo $aToday; ?>"];

              new Chart("myChart1", {
                type: "line",
               data: {
                  labels: xValues,
                 datasets: [{ 
                   data: [<?php echo $countC1; ?>,<?php echo $countC2; ?>,<?php echo $countC3; ?>,<?php echo $countC4; ?>,<?php echo $countC5; ?>],
                   borderColor: "red",
                   fill: true,
                   label: 'Questions'
                   
                 }, { 
                   data: [<?php echo $countR1; ?>,<?php echo $countR2; ?>,<?php echo $countR3; ?>,<?php echo $countR4; ?>,<?php echo $countR5; ?>],
                   borderColor: "green",
                   fill: true,
                   label: 'Reponses'
                   
                 },]
               },
                options: {
                  legend: {display: true},
             title: {
             display: true,
             text: "Questions et reponse par jour",
             fontSize: 16
       }
                  
               }
              });
              </script>
                   </div>
                   
      <div class="col-6"><h4>Fichiers:</h4>

      <?php 
//files
    $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
    //byesterday
    $queryF1 = "SELECT count(file_name) as total_file_1 FROM fileupload WHERE Time LIKE '%$Byesterday%'  ";
    $resultsF1 = mysqli_query($db, $queryF1);
    $rowF1 = mysqli_fetch_array($resultsF1);
    if(mysqli_num_rows($resultsF1) == 1) {
    $countF1 = $rowF1['total_file_1'];} 
    //yesterday
    $queryF2 = "SELECT count(file_name) as total_file_2 FROM fileupload WHERE Time LIKE '%$yesterday%'  ";
    $resultsF2 = mysqli_query($db, $queryF2);
    $rowF2 = mysqli_fetch_array($resultsF2);
    if(mysqli_num_rows($resultsF2) == 1) {
    $countF2 = $rowF2['total_file_2'];}
    //today
    $queryF3 = "SELECT count(file_name) as total_file_3 FROM fileupload WHERE Time LIKE '%$today%'  ";
    $resultsF3 = mysqli_query($db, $queryF3);
    $rowF3 = mysqli_fetch_array($resultsF3);
    if(mysqli_num_rows($resultsF3) == 1) {
    $countF3 = $rowF3['total_file_3'];}
    //tommorow
    $queryF4 = "SELECT count(file_name) as total_file_4 FROM fileupload WHERE Time LIKE '%$tomorrow%'  ";
    $resultsF4 = mysqli_query($db, $queryF4);
    $rowF4 = mysqli_fetch_array($resultsF4);
    if(mysqli_num_rows($resultsF4) == 1) {
      $countF4 = $rowF4['total_file_4'];
    }
    //atomorrow
    $queryF5 = "SELECT count(file_name) as total_file_5 FROM fileupload WHERE Time LIKE '%$atomorrow%'  ";
    $resultsF5 = mysqli_query($db, $queryF5);
    $rowF5 = mysqli_fetch_array($resultsF5);
    if(mysqli_num_rows($resultsF5) == 1) {
    $countF5 = $rowF5['total_file_5'];}
    ?>



      <div id="myPlot" style="width:100%;max-width:700px"></div>

                <script>
                var xArray = ["<?php echo $bYday; ?>","<?php echo $Yday; ?>","<?php echo $Tday; ?>","<?php echo $oTday; ?>","<?php echo $aToday; ?>"];
                var yArray = [<?php echo $countF1; ?>,<?php echo $countF2; ?>,<?php echo $countF3; ?>,<?php echo $countF4; ?>,<?php echo $countF5; ?>];

                var data = [{
                 x:xArray,
                 y:yArray,
                 type:"bar"
                }];

                var layout = {   position:1400,width: 320, plot_bgcolor:'rgba(0,0,0,0)',paper_bgcolor: "rgba(0,0,0,0)"};
                

                Plotly.newPlot("myPlot", data, layout);
</script>
      
      
      </div>
    </div>
  </div>
  <div class="col-4"><h3>Etudiants:</h3>
  <br><br>
  <div class="col-12  boxshadow">
  <?php 
              $db = mysqli_connect('127.0.0.1', 'root', '', 'pfe');
              //SMI
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='SMI' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSMI = $row['total_stu'];} 
             //SMA
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='SMA' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSMA = $row['total_stu'];}
             //SMP
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='SMP' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSMP = $row['total_stu'];}
             //SMC
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='SMC' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSMC = $row['total_stu'];}
             //SVT
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='SVT' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSVT = $row['total_stu'];}
             //STU
             $query = "SELECT count(students.ID) as total_stu FROM students ,studentinfo WHERE students.ID=studentinfo.StudentId AND studentinfo.Filliere='STU' ";
              $results = mysqli_query($db, $query);
              $row = mysqli_fetch_array($results);
             if(mysqli_num_rows($results) == 1) {
             $countSTU = $row['total_stu'];}
    ?>


                  <canvas id="myChart" style="height:750px;width:800px;max-width:1600px"></canvas>

          <script>
            var xValues = ["SMI", "SMA", "SMP", "SMC", "SVT","STU"];
            var yValues = [<?php echo $countSMI ?>, <?php echo $countSMA ?>, <?php echo $countSMP ?>, <?php echo $countSMC ?>, <?php echo $countSVT ?>,<?php echo $countSTU ?>];
            var barColors = [
             "#b91d47",
             "#00aba9",
             "#2b5797",
             "#e8c3b9",
             "#1e7145"
            ];

            new Chart("myChart", {
             type: "pie",
             data: {
                labels: xValues,
                datasets: [{
                  backgroundColor: barColors,
                  data: yValues
                }]
             },
             options: {
                title: {
                  display: true,
                 text: "Students Per Filliere"
                 
                }
             }
            });
            </script>
  
  </div>
</div>
</div>

<br> <br> <br>


<div class=" container-fluid Students">
                    <div class="row ">
                        <div class="col-lg-12 ">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Etudiants</h4>
                                </div>
                                <div class="card-body-- boxshadow">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>ID</th>
                                                    <th>Nom Complete</th>
                                                    <th>Apogee</th>
                                                    <th>Filliere</th>
                                                    <th>Semestre</th>
                                                    <th>Section</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                          <?php  
                                          $prflimgs="";
                                          $i=0;
                                          $queryst = "SELECT * FROM students as s ,studentinfo as si Where s.ID=si.StudentId ORDER BY ID LIMIT 5";
                                                 $resultsSt = mysqli_query($db, $queryst);
                                                 while($rowst = $resultsSt->fetch_array()){
                                                   $i++;
                                                   $ids=$rowst['ID'];
                                                   $names=$rowst['Name'];
                                                   $surnames=$rowst['Surname'];
                                                   $apogee=$rowst['Apogee'];
                                                   $fillieres=$rowst['Filliere'];
                                                   $semestres=$rowst['Semestre'];
                                                   $sections=$rowst['Section'];
                                                   $prflimgs=$rowst['profile_image'];
                                                   echo '<tr>
                                                   <td class="serial">'.$i.'</td>
                                                   <td class="avatar">';
                                                   if(!empty($prflimgs))
                                                   echo'
                                                       <div class="round-img">
                                                           <a href="#"><img class="rounded-circle" style="width:40px;height:40px" src="ImagesPrfl/'.$prflimgs.'" alt=""></a>
                                                       </div>';
                                                       else echo'
                                                       <div class="round-img">
                                                           <a href="#"><img class="rounded-circle" style="width:40px;height:40px" src="Img/user.jpg" alt=""></a>
                                                       </div>';
                                                       echo'
                                                   </td>
                                                   <td> #'.$ids.' </td>
                                                   <td>  <span class="name">'.$names.' '.$surnames.'</span> </td>
                                                   <td> <span class="filliere">'.$apogee.'</span> </td>
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
                       
                                </div>

                                
                    </div>
<br><br><br>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
