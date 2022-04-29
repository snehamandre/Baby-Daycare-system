<?php
include('includes/config.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $yname=$_POST['yname'];
    $phone=$_POST['phone'];
    $aphone=$_POST['aphone'];
    $email=$_POST['email'];
    $childname=$_POST['childname'];
     $dob=$_POST['dob'];
    $childgender=$_POST['childgender'];
    $program=$_POST['program'];
    $address=$_POST['address'];
    $zipcode=$_POST['zipcode'];
     $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $enrollnum=mt_rand(100000000, 999999999);
    $_SESSION['enrollnum']=$enrollnum;

    $success=true;

    $parentIDQuery ="select ID from tblparent where Email='$email' limit 1";
    $ret1=mysqli_query($con,$parentIDQuery);
    $parentID='';
    while ($row=mysqli_fetch_array($ret1)) {
      $parentID = $row['ID'];
    }
    echo $parentID;

    if ($parentID == '') {
      $query1=mysqli_query($con, "insert into tblparent(Name,PhoneNumber,AlternateNumber,Email,Address,Zipcode,City,State,Country) value('$yname','$phone','$aphone','$email','$address','$zipcode','$city','$state','$country')");
      $ret1=mysqli_query($con,$parentIDQuery);
      while ($row=mysqli_fetch_array($ret1)) {
        $parentID = $row['ID'];
      }
    }
    echo $parentID;

    if ($parentID != '') {
      $childIDQuery ="select ID from tblchild where Name='$childname' limit 1";
      $ret2=mysqli_query($con,$childIDQuery);
      $childID='';
      while ($row=mysqli_fetch_array($ret2)) {
        $childID = $row['ID'];
      }

      if($childID == ''){
        $query2=mysqli_query($con, "insert into tblchild(ParentID,Name,DOB,Gender,ProgramName) value('$parentID','$childname','$dob','$childgender','$program')");
        $ret2=mysqli_query($con,$childIDQuery);
        while ($row=mysqli_fetch_array($ret2)) {
          $childID = $row['ID'];
        }
        echo $childID;

        if ($childID != '') {
          $query3=mysqli_query($con, "insert into tblenrollment(EnrollmentNumber, ChildID) value('$enrollnum','$childID')");
          if ($query3) {
            echo "<script>window.location.href='thank-you.php'</script>";
          } else{
             echo '<script>alert("Something Went Wrong. Please try again")</script>';
          }
        } else{
           echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
      }
    } else{
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
  ?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Baby Day Care Management System | Enrollment Page</title>
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
      <section class="contact" >
         <div class="container">
            <h3 class="title text-center mb-3">Enroll Form</h3>

            <div class="wthree-info-para">
               <!--contact-map -->
               <form method="post">
                  <h6 class="title text-left mb-3" style="color:blue;padding-top: 20px;">Primary Detail</h6>
                  <div class="contact-mid row">

                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Your Name:</label>
                        <input type="text" class="form-control" placeholder="Your Name" required="" name="yname">
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Mobile Number:</label>
                        <input type="text" class="form-control" placeholder="Mobile Number" required="" name="phone" pattern="[0-9]+" maxlength="10">
                     </div>
                  </div>
                  <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Alterate Mobile Number:</label>
                        <input type="text" class="form-control" placeholder="Alternate Number" required="" name="aphone" pattern="[0-9]+" maxlength="10">
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Email:</label>
                        <input type="email" class="form-control" placeholder="Email" required="" name="email">
                     </div>
                  </div>
                   <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Child Name:</label>
                        <input type="text" class="form-control" placeholder="Child Name" required="" name="childname">
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Date of Birth:</label>
                        <input type="date" class="form-control" placeholder="Date of Birth" required="" name="dob">
                     </div>
                  </div>
                  <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Child Gender:</label>
                        <select type="text" class="form-control" placeholder="Child Name" required="" name="childgender">
                           <option value="">Choose Gender</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                           <option value="Other">Other</option>
                        </select>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Program:</label>
                        <select type="text" class="form-control" placeholder="Child Name" required="" name="program">
                           <option value="">Choose Program</option>
                           <option value="Play Group">Play Group(1.5-2.5 yrs)</option>
                           <option value="Nursery">Nursery(2.5-3.5 yrs)</option>
                            <option value="Lower KG">Lower KG(3.5-4.5 yrs)</option>
                           <option value="Upper KG">Upper KG(4.5-6 yrs)</option>
                        </select>
                     </div>
                  </div>
                  <h6 class="title text-left mb-lg-5 mb-md-4 mb-sm-4 mb-3" style="color:blue;padding-top: 20px;">Address Detail</h6>
                 <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Address:</label>
                        <input type="text" class="form-control" placeholder="Address" required="" name="address">
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Zipcode:</label>
                        <input type="text" class="form-control" placeholder="Zipcode" required="" name="zipcode">
                     </div>
                  </div>
                  <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>City:</label>
                        <input type="text" class="form-control" placeholder="City" required="" name="city">
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>State:</label>
                        <input type="text" class="form-control" placeholder="State" required="" name="state">
                     </div>
                  </div>
                   <div class="contact-mid row">
                     <div class="col-lg-6 col-md-6 col-sm-6 form-group contact-forms"><label>Country:</label>
                        <input type="text" class="form-control" placeholder="Country" required="" name="country">
                     </div>
                  </div>
                  <div class="text-left click-subscribe">
                     <button type="submit" class="btn click-me" type="submit" name="submit">Enroll</button>
                  </div>
               </form>
            </div>
         </div>
      </section>
      <!--//contact -->

      <!-- footer -->
     <?php include_once('includes/footer.php');?>
      <!--//footer -->
   </body>
</html>
