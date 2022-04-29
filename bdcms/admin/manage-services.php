<?php session_start();
error_reporting(0);
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  {
header('location:index.php');
}
else{
//Code For Deletion the subadmin
if($_GET['action']=='delete'){
$sasid=intval($_GET['said']);
$query=mysqli_query($con,"delete from tblservices where id='$sasid'");
if($query){
echo "<script>alert('Services deleted successfully.');</script>";
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
  <title>BDCMS | Manage Services</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Services</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <a href="add-services.php">Add services</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Service Name</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $query=mysqli_query($con,"select * from tblservices");
                  $cnt=1;
                  while($result=mysqli_fetch_array($query)){
                  ?>

                  <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php echo $result['ServiceName']?></td>
                   <td><?php echo $result['CreationDate']?></td>
                    <th>
     <a href="edit-services.php?editid=<?php echo $result['id'];?>" title="Edit Practice Area">Edit</a> |
     <a href="manage-services.php?action=delete&&said=<?php echo $result['id']; ?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
</th>
                  </tr>
         <?php
$cnt++;
       } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
</body>
</html>
<?php } ?>
