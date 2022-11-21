
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
</head>
<body>
<?php error_reporting(0);?>
<?php if ($checkgr==0) : ?>
<?php header('location: 404.php');?>
<?php endif ?>
<section class="container ng-scope ng-fadeInLeftShort" style="">
<!-- uiView:  -->
<div class="ng-fadeInLeftShort ng-scope" style="">
<div class="container-overlap  ng-scope" style="background-color:#E9FFFF;">
  <div class="media m0 pv">
    <div class="media-left"><a href="groupepage.php?idg=<?php echo $ido;?>"><img src="Img/group.png" alt="User" class="media-object img-circle thumb64"></a></div>
    <div class="media-body media-middle">
      <h4 class="media-heading text-dark"><?php echo $groupname; ?></h4>
      <span class="text-dark"><?php echo $groupsem; ?> module</span>
    </div>
  </div>