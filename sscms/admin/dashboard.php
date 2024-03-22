<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sscmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSCMS</title>
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



<!-- App CSS -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />



</head>

<body>
<?php include_once('includes/header2.php');?>
  <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
       
      <div class="container mx-5 mt-5 row">
                    <div class="col-md-5 ">
                        <div class="card-box tilebox-one">
                             <?php 
                        $sql1 ="SELECT * from  tbldesk";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totaldesks=$query1->rowCount();
?><i class="fa fa-desktop float-right"></i>
                            
                            <h6 class="text-muted text-uppercase m-b-20">Total Desks</h6>
                            <h2 class="m-b-20" data-plugin="counterup"><?php echo htmlentities($totaldesks);?></h2>
                            <a href="manage-desks.php"><span class="badge badge-primary"> View Detail </span></a> 
                        </div>
                    </div>
<div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="card-box tilebox-one">
                             <?php 
                        $sql1 ="SELECT * from  tbldesk where isOccupied='' || isOccupied is null";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totaldesksavail=$query1->rowCount();
?>
                           <i class="fa fa-desktop float-right"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Total Desk Available</h6>
                            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo htmlentities($totaldesksavail);?></span></h2>
                            <a href="manage-desks.php"><span class="badge badge-success"> View Detail </span></a> 
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card-box tilebox-one">
                             <?php 
                        $sql1 ="SELECT * from  tbldesk where isOccupied='1'";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$isoccupied=$query1->rowCount();
?>
                            <i class="fa fa-desktop float-right"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Desk Occupied</h6>
                            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo htmlentities($isoccupied);?></span></h2>
                            <a href="manage-desks.php"><span class="badge badge-danger"> View Detail </span></a> 
                        </div>
                    </div>
                    <div class="col-md-1"></div>

            <div class="col-md-5">
                        <div class="card-box tilebox-one">
                             <?php 
                        $sql11 ="SELECT * from  tblstudents ";
$query11 = $dbh -> prepare($sql11);
$query11->execute();
$results11=$query11->fetchAll(PDO::FETCH_OBJ);
$totalregstd=$query11->rowCount();
?>
                            <i class="fa fa-users float-right"></i>
                            <h6 class="text-muted text-uppercase m-b-20">Total Registered Students</h6>
                            <h2 class="m-b-20"><span data-plugin="counterup"><?php echo htmlentities($totalregstd);?></span></h2>
                            <a href="manage-students.php"><span class="badge badge-danger"> View Detail </span></a> 
                        </div>
                    </div>



                  
                </div>
                <!-- end row -->
      <!-- partial -->
        <!-- partial:../../partials/_footer.html -->
     


  <!-- container-scroller -->
  <!-- plugins:js -->
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
  <!-- End custom js for this page-->

        
</body>

</html>
<?php } ?>
