<?php
include('includes/config.php');
session_start();
error_reporting(0);
  ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Baby Day Care Management System | Info of Babysitter</title>

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
         <section class="blog" id="blog">
         <div class="container">
            <h3 class="title text-center mb-3">Our Babysitter</h3>
              <?php

              $ret=mysqli_query($con,"select * from tblbabysitter");
              $cnt=1;
              while ($row=mysqli_fetch_array($ret)) {

              ?>
                <div class="row" style="border-bottom:1px solid #c1c1c1">
                   <div>
                      <div>
                         <h6><?php  echo $row['Name'];?></h6>
                      </div>
                      <div>
                         <p>Language Known: <?php  echo $row['LanguagesKnown'];?> </p>
                         <p>Expirience: <?php  echo $row['BabysitterExp'];?> </p>
                         <p>Certificate: <?php  echo $row['Certificate'];?> </p>
                      </div>
                   </div>
                 </div>
             <?php } ?>
         </div>
      </section>
      <!--//blog -->


      <!-- footer -->
     <?php include_once('includes/footer.php');?>
      <!--//footer -->
   </body>
</html>
