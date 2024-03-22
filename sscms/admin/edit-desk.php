<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sscmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['update']))
{
$deskid=intval($_GET['did']);
$lcsocket=$_POST['laptopchargersocket'];
$sql="update tbldesk set laptopChargerScoket=:lcsocket where id=:deskid";
$query=$dbh->prepare($sql);
$query->bindParam(':lcsocket',$lcsocket,PDO::PARAM_STR);
$query->bindParam(':deskid',$deskid,PDO::PARAM_STR);
 $query->execute();

 
echo '<script>alert("Desk details has been updated.")</script>';
echo "<script>window.location.href ='manage-desks.php'</script>";


  }


?>
<!doctype html>
<html lang="en">

    <head>
       
               
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SSCMS | Edit Desk</title>
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
<script>
function checkDeskAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'dno='+$("#desknumber").val(),
type: "POST",
success:function(data){
$("#desk-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

       
    </head>


    <body>

<?php include_once('includes/header2.php');?>
     
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Add Desk</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-lg-6">

                                    <h4 class="header-title m-t-0">Add Desk</h4>
                                    
                                    <div class="p-20">



                                        <form action="#" method="post">
                                            
<div class="form-group">
<?php
$deskid=intval($_GET['did']);
$sql="SELECT * from tbldesk where id='$deskid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $row)
{               ?>   
<label for="userName">Desk Number<span class="text-danger">*</span></label>
<input type="text" class="form-control" value="<?php  echo htmlentities($row->deskNumber);?>" required="true" name="desknumber" id="desknumber" readonly>


                                            </div>
                                            <div class="form-group">
                                                <label for="emailAddress">Laptop / Charger Socket<span class="text-danger"></span></label>

<?php  $lapchargerscoket=$row->laptopChargerScoket; 
if($lapchargerscoket==''):?>
<input type="checkbox" value="Yes" name="laptopchargersocket">
<?php else: ?>
    <input type="checkbox" value="Yes" name="laptopchargersocket" checked>
<?php endif;?>
                                            </div>
                                        
<?php } ?>

                                            <div class="form-group text-left m-b-0">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="update">
                                                    Update
                                                </button>
                                                
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