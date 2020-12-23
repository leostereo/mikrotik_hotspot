<?php
require 'static_classes/ErrorManager.php';

   $mac=$_POST['mac'];
   $ip=$_POST['ip'];
   $username=$_POST['username'];
   $linklogin=$_POST['link-login'];
   $linkorig=$_POST['link-orig'];
   $error=$_POST['error'];
   $chapid=$_POST['chap-id'];
   $chapchallenge=$_POST['chap-challenge'];
   $linkloginonly=$_POST['link-login-only'];
   $linkorigesc=$_POST['link-orig-esc'];
   $macesc=$_POST['mac-esc'];
	$error_msg = ErrorManager::get_error($error);
	#print_r($_POST);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style4.css">

    <title>Wiber Hotspot</title>
  </head>
  <body onload="set_init();">

<div class="container">

<script>
function set_is_customer() {
	radiobtn = document.getElementById("is_customer");
	radiobtn.checked = true;
	myform = document.getElementById('login');
	myform.submit();
}
function set_is_not_customer() {
	radiobtn = document.getElementById("is_customer");
	myform = document.getElementById('login');
	myform.submit();
	radiobtn.checked = false;
}
function set_init() {
	radiobtn = document.getElementById("is_customer");
	radiobtn.checked = false;
}
</script>

<?php
		if($error_msg){
                echo <<<EOT
                        <div class="alert alert-danger" role="alert">
                                $error_msg
                        </div>

EOT;
		}
?>



	<div class="logo_frame">
		<img src="images/logo.png" alt="www.wiber.com"  ><br><br>
	</div>

	<form <form name="login" id="login" action="form.php" method="post">
                     <input type="hidden" name="ip_address" value="<?php echo $ip; ?>" />
                     <input type="hidden" name="mac_address" value="<?php echo $mac; ?>" />
                     <input type="hidden" name="macesc" value="<?php echo $macesc; ?>" />
                     <input type="hidden" name="linkloginonly" value="<?php echo $linkloginonly; ?>" />
                     <input type="hidden" name="linkorigesc" value="<?php echo $linkorigesc; ?>" />
                     <input type="hidden" name="chap-id" value="<?php echo $chapid; ?>" />

                     <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="link" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="popup" value="true" />
	             <input  style="display:none" type="checkbox" id="is_customer" name="is_customer"/>

	</form>

		<div class="text-center">
			<br>
			<div class="row justify-content-center">
				<div class="button-group">  
						<button onclick="set_is_customer()" class="btn btn-primary btn-lg btn-block">Soy cliente wiber</button>

						<button  onclick="set_is_not_customer()" class="btn btn-primary btn-lg btn-block">No soy cliente wiber</button>
				</div>
			</div>
		</div>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="jquery-3.5.1.min.js"</script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>

  </body>
</html>
