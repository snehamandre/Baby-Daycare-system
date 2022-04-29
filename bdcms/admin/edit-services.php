<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  {
header('location:index.php');
}
else{
// Code for Update Services
if(isset($_POST['update'])){
$service=$_POST['service'];
$sdetail=$_POST['sdetail'];
$editid=intval($_GET['editid']);
$query=mysqli_query($con,"update tblservices set  ServiceName ='$service',ServiceDetail='$sdetail' where id='$editid'");
if($query){
echo "<script>alert('Services updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-services.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BDCMS  | Edit Services</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!--Function Email Availabilty---->


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Services</h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Services</h3>
              </div>
              <form name="subadmin" method="post">
                <div class="card-body">
                <?php
                $editid=intval($_GET['editid']);
                 $query=mysqli_query($con,"select * from tblservices where  id='$editid'");
                $cnt=1;
                while($result=mysqli_fetch_array($query)){
                ?>
                <div class="form-group">
                  <label for="exampleInputFullname">Service Name</label>
                  <input type="text" class="form-control" id="service" name="service"  value="<?php echo $result['ServiceName'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFullname">Services Detail</label>
                  <textarea type="text" class="form-control" id="sdetail" name="sdetail" required><?php echo $result['ServiceDetail'];?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFullname">Creation Date</label>
                    <input type="text" class="form-control" id="creationdate" name="creationdate" value="<?php echo $result['CreationDate'];?>" readonly>
                  </div>
                <?php } ?>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
