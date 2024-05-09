<?php
session_start();
if (!$_SESSION["login"]) {
    header("Location: ../admin/login.php");
}
else{
    header("Location: ../admin/dashboard.php");
}
?>