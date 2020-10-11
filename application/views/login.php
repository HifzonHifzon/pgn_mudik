<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/bootstrap/css/bootstrap.min.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/fonts/iconic/css/material-design-iconic-font.min.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/animate/animate.css' ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/css-hamburgers/hamburgers.min.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/animsition/css/animsition.min.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/select2/select2.min.css' ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/vendor/daterangepicker/daterangepicker.css' ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/css/util.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/login/css/main.css' ?>" >
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
					<span class="login100-form-title p-b-26">
			
					</span>
					<span class="login100-form-title p-b-48">
                        <!-- <i class="zmdi zmdi-font"></i> -->
                        <img src="<?php echo base_url(). 'assets/images/pgn.png'?>" height="180px" width="150px">
					</span>

                <form action="<?php echo base_url().'login/authentikasi_login' ?>" method="POST">
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
					
						<input class="input100" type="password" name="pass">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" value="login">
                                login
                            </button>
							
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
			</div>
		</div>
	</div>
	

	

</body>
</html>