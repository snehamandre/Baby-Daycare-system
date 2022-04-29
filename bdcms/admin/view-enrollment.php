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
if(isset($_POST['submit']))
  {

    $viewid=$_GET['viewid'];
    $ressta=$_POST['status'];
    $remark=$_POST['remark'];
   $query=mysqli_query($con, "update tblenrollment set Remark='$remark', Status='$ressta' where ID='$viewid'");
    if ($query) {

    echo '<script>alert("Enrollment Status Has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='enrollments.php'; </script>";
  }
  else
    {

      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }


}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BDCMS | View Enrollment</title>

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
            <h1>View Enrollment</h1>
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


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Enrollment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
 $viewid=$_GET['viewid'];
 $query="select e.EnrollmentNumber, e.Status, e.EnrollDate, p.Name, p.Email, p.PhoneNumber, p.AlternateNumber, p.Address, p.Zipcode, p.City, p.State, p.Country, c.Name as ChildName, c.DOB, c.Gender, c.ProgramName from tblenrollment e  left join tblchild c on e.ChildID = c.ID  left join tblparent p on c.ParentID = p.ID where e.ID='$viewid'";
$ret=mysqli_query($con,$query);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
               <table class="table table-bordered data-table">
 <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 View Enrollment Details of (<?php  echo $row['EnrollmentNumber'];?>)</td></tr>


 <tr>
    <th>Parent Name</th>
    <td><?php  echo $row['Name'];?></td>

    <th>Phone Number</th>
    <td><?php  echo $row['PhoneNumber'];?></td>

  </tr>
  <tr>
    <th>Alternate Contact Number</th>
    <td><?php  echo $row['AlternateNumber'];?></td>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>

  </tr>

  <tr>
    <th>Child Name</th>
    <td><?php  echo $row['ChildName'];?></td>
       <th>Child DOB</th>
    <td><?php  echo $row['DOB'];?></td>

  </tr>

  <tr>
   <th>Child Gender</th>
    <td><?php  echo $row['Gender'];?></td>
     <th>Program Name</th>
    <td><?php  echo $row['ProgramName'];?></td>

  </tr>
  <tr>
   <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
     <th>Zipcode</th>
    <td><?php  echo $row['Zipcode'];?></td>

  </tr>
  <tr>
    <th>City</th>
    <td><?php  echo $row['City'];?></td>
     <th>State</th>
    <td><?php  echo $row['State'];?></td></tr>

  <tr>
    <th>Country</th>
    <td><?php  echo $row['Country'];?></td>
  </tr>
  <tr>
    <th>Enrollment Status</th>
    <td> <?php
    $status=$row['Status'];
if($row['Status']=="Accepted")
{
  echo "Enrollment request has been accepted";
}


if($row['Status']=="Onhold")
{
  echo "Enrollment request is onhold";
}
if($row['Status']=="Rejected")
{
  echo "Enrollment request has been rejected";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}



     ;?></td>
     <th>Enrollment Date</th>
    <td><?php  echo $row['EnrollDate'];?></td>
  </tr>
</table>
 <?php } ?>

<?php if($status=="" || $status=="Onhold"){ ?>

  <form method="post" name="submit">
    <table class="table table-bordered table-hover data-tables">
      <tr>
        <th>Remark :</th>
        <td>
          <textarea name="remark" placeholder="Remark" rows="12" cols="14" class="form-control wd-450" required="true">
          </textarea>
        </td>
      </tr>
      <tr>
        <th>Status :</th>
        <td>
          <select name="status" class="form-control wd-450" required="true" >
          <option value="Accepted" selected="true">Accepted</option>
          <option value="Onhold">Onhold</option>
          <option value="Rejected">Rejected</option>
          </select>
        </td>
      </tr>
    </table>
    <div class="">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
<?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
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

  <!-- Control Sidebar -->
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
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php } ?>
