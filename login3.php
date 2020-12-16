<?php
	$mac=$_POST['mac'];
	$ip=$_POST['ip'];
	$username=$_POST['username'];
	$linklogin=$_POST['link-login'];
	$linkorig=$_POST['link-orig'];
	$error=$_POST['error'];
?>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>Wiber HOT SPOT</title>
	<link rel="stylesheet" href="./css/style.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="logo_container">
					<img src="./images/logo.png" class="brand_logo" alt="Logo">
				</div>	
				<div class="d-flex justify-content-center form_container">
					<form action="insert.php" method="post">
						<div class="input-group mb-3">
                            			<input type="hidden" name="ip_address" value="<?php echo $ip; ?>"/>

                            			<input type="hidden" name="mac_address" value="<?php echo $mac; ?>"/>
						</div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="nombre">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-id-card"></i></span>
							</div>
							<input type="text" name="document" class="form-control input_pass" value="" placeholder="documento">
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
		
			</div>
		</div>
</body>
</html>
