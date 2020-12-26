<?php session_start();
include "db-connect.php";

$email_log=$npdms['db']->real_escape_string($_POST['email']);
$password_log=$npdms['db']->real_escape_string($_POST['psw']);
// คำสั่ง SQL และสังให้ทำงาน 	lcp3_admin admin_email admin_pass $npdms['db']
$sTable = "lcp3_admin";
$sql ="select * from lcp3_admin where admin_email='".$email_log."'and admin_pass ='".$password_log."'";

$rResult = $npdms['db']->query($sql) or die($npdms['db']->error);
$aResult = $rResult->fetch_array(MYSQLI_ASSOC);

if(!$aResult)
          {
          echo "Email and Password
          Incorrect!";header("location:lcp3-login.php");
          }
else
          {
          $_SESSION["UserID"] =session_id();
          header("location:index_admin.php");
          }
          $npdms['db']-close;
?>