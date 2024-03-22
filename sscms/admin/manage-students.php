
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sscmsaid']==0)) {
  header('location:logout.php');
  } else{

// Code for deleting student details
if(isset($_GET['stdid']))
{
$studentid=intval($_GET['stdid']);
$sql="delete from tblstudents where id=:sid";
$query=$dbh->prepare($sql);
$query->bindParam(':sid',$studentid,PDO::PARAM_STR);
$query->execute();
 echo "<script>alert('Student record deleted');</script>"; 
  echo "<script>window.location.href = 'manage-students.php'</script>";     


}

  ?><!doctype html>
<html lang="en">

    <head>
        
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSCMS | Manage Student</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo.png" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

      <?php include_once('includes/header2.php');?>


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
    
            <div class="container">


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title">Manage Student Details</h4>
                            

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr><th>#</th>
                                                    <th>Reg No</th>
                                                    <th>Name</th>
                                                    <th>Contact No</th>
                                                    <th>Email Id</th>
                                                    <th>Qualification</th>
                                                    <th>Reg Date</th>
                                                    <th>Action</th>
                                                </tr>
                                </thead>


                                <tbody>
 <?php
$sql="SELECT * from tblstudents";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{          ?>

<tr>
<td><?php echo htmlentities($cnt);?></td>
<td><?php  echo htmlentities($row->registrationNumber);?></td>
<td><?php  echo htmlentities($row->studentName);?></td>
<td><?php  echo htmlentities($row->studentContactNo);?></td>
<td><?php  echo htmlentities($row->studentEmailId);?></td>
<td><?php  echo htmlentities($row->studentQualification);?></td>
<td><?php  echo htmlentities($row->regDate);?></td>
<td><a href="edit-student.php?stdid=<?php echo htmlentities ($row->id);?>" class="btn btn-primary">Edit</a>  <a href="manage-students.php?stdid=<?php echo ($row->id);?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-danger"/>Delete</a>
<a href="student-details.php?stdid=<?php echo htmlentities ($row->id);?>" class="btn btn-primary">View Details</a>
</td>
                                                        
                                                    </tr>
                                                   <?php $cnt=$cnt+1;}} ?> 
                              
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end row -->



            </div> <!-- container -->
<?php include_once('includes/footer.php');?>

        </div> <!-- End wrapper -->


        <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

    </body>
</html><?php }  ?>