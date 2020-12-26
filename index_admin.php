<?php session_start();
if($_SESSION['UserID'] <> session_id()){
header("location:lcp3-login.php"); exit();
}
?>
