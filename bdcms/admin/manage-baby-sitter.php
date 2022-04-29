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
//Code For Deletion the admin
if($_GET['action']=='delete'){
$bsid=intval($_GET['bsid']);
$profilepic=$_GET['profilepic'];
$ppicpath="lawyerpic"."/".$profilepic;
$query=mysqli_query($con,"delete from tblbabysitter where id='$bsid'");
if($query){
unlink($ppicpath);
echo "<script>alert('Baby sitter details deleted successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-baby-sitter.php'; </script>";
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
  <title>BDCMS | Manage Baby Sitter</title>

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
            <h1>Manage Baby Sitter</h1>
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
                <a href="add-baby-sitter.php">Add Baby Sitter</a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email ID</th>
                    <th>Mobile Number</th>
                    <th>Reg. Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php $query=mysqli_query($con,"select * from tblbabysitter");
                  $cnt=1;
                  while($result=mysqli_fetch_array($query)){
                  ?>

                  <tr>
                     <td><?php echo $cnt;?></td>
                    <td><?php echo $result['Name']?></td>
                   <td><?php echo $result['Email']?></td>
                    <td><?php echo $result['MobileNo']?></td>
                    <td><?php echo $result['RegDate']?></td>
                    <th>
     <a href="edit-baby-sitter.php?editid=<?php echo $result['id'];?>" title="Edit Baby Sitter Details">Edit</i> </a> |
     <a href="manage-baby-sitter.php?action=delete&&bsid=<?php echo $result['id']; ?>&&profilepic=<?php echo $result['ProfilePic'];?>" style="color:red;" title="Delete this record" onclick="return confirm('Do you really want to delete this record?');">Delete</a>
 </th>
                  </tr>
         <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            <!-- /.card -->
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
