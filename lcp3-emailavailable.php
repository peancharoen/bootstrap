<?php
 include_once('lcp3-functions.php');
 $emailcheck = new DB_con();
 //get post
 $eml = $_POST['email'];
    $eml = $emailcheck->emailavailable($eml);
    $num = $eml->num_rows;
    if ($num > 0 ){
			echo"<span style='color: red;'>Email already register.</span>";
			echo"<script>$('#submit').prop('disabled',true);</script>";
		} else {
			echo"<span style='color: green;'>Email available for register.</span>";
			echo"<script>$('#submit').prop('disabled',false);</script>";
		}
?>