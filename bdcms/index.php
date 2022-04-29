<?php
include('includes/config.php');
session_start();
error_reporting(0);


  ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Baby Day Care Management System | Home Page</title>
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <link href="//fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
   </head>
   <body>
      <div class="main-top" id="home">
         <?php include_once("includes/navbar.php");?>
         <div class="slider-img "/>
      </div>
     <?php include_once('includes/footer.php');?>
   </body>
</html>
