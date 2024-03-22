<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sscmsaid']==0)) {
  header('location:logout.php');
  } else{


//Add Students  
    if(isset($_POST['submit']))
  {

$regno=$_POST['studentregno'];
$sname=$_POST['studentname'];
$scno=$_POST['studentcontactno'];
$studentemail=$_POST['studentemail'];
$squalification=$_POST['qualification'];
$address=$_POST['address'];
$status=1;
$sql="insert into tblstudents(registrationNumber,studentName,studentContactNo,studentEmailId,studentQualification,studentAddress,isActive)values(:regno,:sname,:scno,:studentemail,:squalification,:address,:status)";
$query=$dbh->prepare($sql);
$query->bindParam(':regno',$regno,PDO::PARAM_STR);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':scno',$scno,PDO::PARAM_STR);
$query->bindParam(':studentemail',$studentemail,PDO::PARAM_STR);
$query->bindParam(':squalification',$squalification,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Student Details added successfully")</script>';
echo "<script>window.location.href ='manage-students.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>
<!doctype html>
<html lang="en">

    <head>
       
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSCMS | Add Student</title>
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
       
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Add Student Detail</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-lg-6">

                                    <h4 class="header-title m-t-0">Add Student Detail</h4>
                                    
                                    <div class="p-20">
                                        <form action="#" method="post">
                                           
<div class="form-group">
<label for="studentname">Student Registation Number <small>(Auto Generated)</small><span class="text-danger">*</span></label>
<input type="text" class="form-control" required="true" name="studentregno" value="<?php echo mt_rand(1000000000,9999999999)?>" readonly>
</div>                          
<div class="form-group">
<label for="studentname">Student Name<span class="text-danger">*</span></label>
<input type="text" class="form-control" placeholder="Student Name" required="true" name="studentname">
</div>


<div class="form-group">
<label for="studentname">Student Contact  Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" placeholder="Student Contact Number" required="true" name="studentcontactno" pattern="[0-9]{10}" maxlength="10" title="10 numeric characters only">
</div>


<div class="form-group">
<label for="studentname">Student Email<span class="text-danger">*</span></label>
<input type="email" class="form-control" placeholder="Student Email Id" required="true" name="studentemail">
</div>


<div class="form-group">
<label for="studentname">Qualification<span class="text-danger">*</span></label>
<input type="text" class="form-control" placeholder="Student Qualification" required="true" name="qualification">
</div>

<div class="form-group">
<label for="emailAddress">Address<span class="text-danger">*</span></label>
<textarea  class="form-control" placeholder="Address" required="true" name="address"></textarea>
</div>
                                            
                                    
        
<div class="form-group text-left m-b-0">
<button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">
Add</button>
                                                
                                            </div>

                                        </form>
                                    </div>

                                </div>
                             
                            </div>
                            <!-- end row -->


                        </div>
                    </div><!-- end col-->

                </div>
                <!-- end row -->

            </div> <!-- container -->

<?php include_once('includes/footer.php');?>

        </div> <!-- End wrapper -->


        </div> <!-- End wrapper -->
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

        <script>
            $(document).ready(function() {
                $('form').parsley();
            });
        </script>

    </body>
</html><?php }  ?>