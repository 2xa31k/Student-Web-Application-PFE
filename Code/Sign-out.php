<?php
session_start();
session_destroy();
header('location: Sign-in.php');?>