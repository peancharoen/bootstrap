<?php
	session_start();
	include_once('lcp3-functions.php');
	$userdata = new DB_con();
	
	if(isset($_POST['login'])) {
		$uemail = $_POST['email'];
		$upassword = $_POST['password'];

		$usql = $userdata->login($uemail, $upassword);
		$num = $usql->fetch_array();
		
		if ($num > 0) {
			$_SESSION['id'] = $num['ID'];
			$_SESSION['fname'] = $num['fullname'];
			echo "<script>alert('Login Success!')</script>";
			echo "<script>window.location.href='lcp3-welcom.php'</script>";
		} else {
			echo "<script>alert('Something went wrong! Please try again.')</script>";
			echo "<script>window.location.href='lcp3-login.php'</script>";
			
		}

	}

?>

<!DOCTYPE html>
<html lang="en">
	
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	
	<!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	
	<!-- นำเข้า  Javascript จาก  Jquery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" 
	integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>

  <div class="container mt-5 pt-5 mb-5">
		<div class="row justify-content-center">
			 <div class="col-md-6 col-lg-4 col-xl-4">
					<div class="card">
						 <div class="card-body">
                <div class="imgcontainer m-auto">
                <img src="/bootstrap/img/avatar.png" alt="Avatar" class="avatar">
                </div> 
								<div class="text-center m-auto">
									 <h5 class="text-uppercase text-center">Login / ลงชื่อ</h5>
								</div>
								<form action="#" method="post">
									 <input type="hidden" name="csrftoken" value="ea49375f43c7e6a59c77df1e4de562b3f1350124eeb70e5d5124e4ce3b5251c2b4d12e9aaf2a3ddc618c178c8dc4620b">
									 <div class="form-group mb-3">
											<label for="emailaddress">Email </label>
											<input type="email" name="email" placeholder="Enter email" class="form-control" required="" onblur="checkemail(this.value)">
											<span id="emailavailable"></span>
									 </div>
									 <div class="form-group mb-3">
											<label for="password">Password</label>
											<div class="input-group bg-light" id="show_hide_password" >
												 <input type="password" class="form-control" id="password" value="Password" name="password"  placeholder="Enter Password" required="">
												 <div class="input-group-addon">
												 <a><i class="fa fa-lg fa-eye" style="padding-top: 10px; padding-left: 10px; padding-right: 10px;" aria-hidden="true"></i></a>
												 </div>
											</div>
									 </div>
									<div class="form-group mb-0 text-center">
											<button class="btn btn-primary btn-block" type="login" name="login" id="login" disabled> Login </button>
									 </div>
									 <script>
										 	jQuery.noConflict();

											jQuery(document).ready(function($) {
													$("#show_hide_password a").on('click', function(event) {
															event.preventDefault();
															if($('#show_hide_password input').attr("type") == "text"){
																	$('#show_hide_password input').attr('type', 'password');
																	$('#show_hide_password i').addClass( "fa-eye-slash" );
																	$('#show_hide_password i').removeClass( "fa-eye" );
															}else if($('#show_hide_password input').attr("type") == "password"){
																	$('#show_hide_password input').attr('type', 'text');
																	$('#show_hide_password i').removeClass( "fa-eye-slash" );
																	$('#show_hide_password i').addClass( "fa-eye" );
															}
													});
											});
									 </script>
								</form>
						 </div>
					</div>
			 </div>
		</div>
	</div> 

</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		function checkemail(val){
			$.ajax({
				type: 'POST',
				url: 'lcp3-emailavailable.php',
				data: 'email='+val,
				success: function(data){
					$('#emailavailable').html(data);
				}

			});
		}
	</script>					
	<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
      integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
      crossorigin="anonymous"></script>		
 	<!-- JavaScript Bundle with Popper -->
 	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
    integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
    integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
		crossorigin="anonymous"></script>
</html>