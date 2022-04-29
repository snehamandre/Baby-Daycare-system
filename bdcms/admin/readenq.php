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


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BDCMS | Read Enquiry</title>

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
            <h1>Read Enquiry</h1>
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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                   <th>S.No</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Enquiry Date</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
$ret=mysqli_query($con,"select * from tblenquiry where IsRead='1'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                  <tr class="gradeX">
                 <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['FirstName'];?> <?php  echo $row['LastName'];?></td>
                                        <td><?php  echo $row['Email'];?></td>
                                        <td>
                                            <span><?php echo $row['EnquiryDate'];?></span>
                                        </td>
                                         <td><a href="view-enquiry.php?viewid=<?php echo $row['ID'];?>">View</a></td>
                </tr>
         <?php
$cnt++;
       } ?>

                  </tbody>
                </table>
              </div>
          </div>
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
</body>
</html>
<?php } ?>
