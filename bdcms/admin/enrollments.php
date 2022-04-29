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
  <title>BDCMS | All Enrollment</title>

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

  <script language="JavaScript">

    function JumpToIt(url) {
      location.href=url;
    }
  </script>
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
            <h1>All Enrollment</h1>
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
                <?php $status = $_GET['status']; ?>
                  <select name="url" id="cars" onchange="JumpToIt(this.value)">
                    <option value="enrollments.php" <?php echo $status == null ? 'selected' : ''; ?>>All</option>
                    <option value="enrollments.php?status=New" <?php echo $status == 'New' ? 'selected' : ''; ?>>New</option>
                    <option value="enrollments.php?status=Accepted" <?php echo $status == 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                    <option value="enrollments.php?status=Onhold" <?php echo $status == 'Onhold' ? 'selected' : ''; ?>>Onhold</option>
                    <option value="enrollments.php?status=Rejected" <?php echo $status == 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                  </select>
                <h3 class="card-title">All Enrollment</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                   <th>S.No</th>
                   <th>Enrollment Number</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Enroolment Date</th>
                     <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "select e.ID, e.EnrollmentNumber, p.Name, p.Email, p.PhoneNumber, e.Status, e.EnrollDate  from tblenrollment e  left join tblchild c on e.ChildID = c.ID  left join tblparent p on c.ParentID = p.ID";
                      $where = " where e.Status='$status'";
                      if($status == null) {
                        $where = "";
                      } else if($status == 'New') {
                        $where = " where e.Status is null";
                      }
                      $ret=mysqli_query($con,"$query $where");
                      $cnt=1;
                      while ($row=mysqli_fetch_array($ret)) {
                    ?>
                  <tr class="gradeX">
                 <td><?php echo $cnt;?></td>

                  <td><?php  echo $row['EnrollmentNumber'];?></td>
                  <td><?php  echo $row['Name'];?></td>
                                        <td><?php  echo $row['Email'];?></td>
                                        <td><?php  echo $row['PhoneNumber'];?></td>
                                         <?php if($row['Status']==""){ ?>

                     <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                     <?php } else { ?>
                      <td><?php  echo $row['Status'];?></td><?php } ?>
                                        <td>
                                            <span><?php echo $row['EnrollDate'];?></span>
                                        </td>
                                         <td><a href="view-enrollment.php?viewid=<?php echo $row['ID'];?>">View</a></td>
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
