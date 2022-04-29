<?php session_start();
include('includes/config.php');

error_reporting(0);


  ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Baby Day Care Management System | Thank You Page</title>
      <!--meta tags -->

      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);

         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <!-- //font-awesome icons -->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
   </head>
   <body>
      <div class="main-top" id="home">
         <!-- header -->
         <?php include_once("includes/navbar.php");?>
         <!-- //header -->


      <!-- contact -->
      <section class="contact" Id="contact">
         <div class="container">
            <h3 class="title text-center mb-3" style="color:blue;padding-top: 60px;">Thank you for applying. Your Enrollment no is <?php echo $_SESSION['enrollnum'];?></h3>


         </div>
      </section>
      <!--//contact -->

      <!-- footer -->
     <?php include_once('includes/footer.php');?>
      <!--//footer -->
   </body>
</html>
