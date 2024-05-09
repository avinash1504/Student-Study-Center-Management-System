<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


//add user
if(isset($_POST['submit']))
{
    echo'<scipt>alert("Inside")</script>';
    $email = $_POST['Email'];
    $mobile = $_POST['MobileNumber'];
    $Address = $_POST['Address'];
    $UserName = $_POST['UserName'];
    $AdminName = $_POST['UserName'];
    $newpassword = md5($_POST['Password']);
  $date = date('Y-m-d H:i:s');
    // echo($email);
    // echo($mobile);
    // echo($Address);
    // echo($UserName);
    // echo($AdminName);
    // echo($newpassword);
    // echo($date);
    
$sql="insert into tbladmin(AdminName,UserName,MobileNumber,Address,Email,Password,AdminRegdate)values(:AdminName,:UserName,:mobile,:Address,:email,:newpassword,:date)";
$query=$dbh->prepare($sql);
$query->bindParam(':AdminName',$UserName,PDO::PARAM_STR);
$query->bindParam(':UserName',$UserName,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':Address',$Address,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':newpassword',$newpassword,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->execute();

 $LastInsertId=$dbh->lastInsertId();
 if ($LastInsertId>0) {
  echo '<script>alert("User created added successfully")</script>';
echo "<script>window.location.href ='login.php'</script>";
}
else
  {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSCMS Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo.png" />
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="d-flex brand-logo">
              
                <img src="../images/logo.png" alt="logo" >
        
                <div class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-muted text-uppercase mt-5 ml-3">REGISTER USER</h6>
                            </div>
                </div>
              </div>
              <!-- <p>Enter your email address and mobile number to reset password!</p> -->
              <form  class="m-t-20" action="#" method="post">
              <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  name="UserName" required="true" placeholder="User Name">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  name="Email" required="true" placeholder="Email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  name="MobileNumber" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg"  name="Password" required="true" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg"  name="Address" required="true" placeholder="Address">
                </div>
                <div class="mt-3">
                  <button type="submit" name="submit" class="btn btn-success btn-block waves-effect waves-light btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >CREATE ACCOUNT</button>
                </div>
               
               
                
              </form>
              <div class="my-2 d-flex justify-content-between align-items-center">
                  <a href="login.php" class="auth-link text-black">Already have an account ? SIGN IN </a>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
</body>

</html>
