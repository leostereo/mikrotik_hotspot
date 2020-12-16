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
  <body>

<div class="container">



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

	<form <form name="login" action="insert.php" method="post">
                     <input type="hidden" name="ip_address" value="<?php echo $ip; ?>" />
                     <input type="hidden" name="mac_address" value="<?php echo $mac; ?>" />
                     <input type="hidden" name="macesc" value="<?php echo $macesc; ?>" />
                     <input type="hidden" name="linkloginonly" value="<?php echo $linkloginonly; ?>" />
                     <input type="hidden" name="linkorigesc" value="<?php echo $linkorigesc; ?>" />
                     <input type="hidden" name="chap-id" value="<?php echo $chapid; ?>" />

                     <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="link" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="popup" value="true" />


	  <div class="form-group">
	    <label for="username">Usuario</label>
	    <input type="text" class="form-control" name="username">
	  </div>
	  <div class="form-group">
	    <label for="document">Documento</label>
	    <input type="text" class="form-control" name="document">
	  </div>
	  <div class="form-group">
	    <label for="phone">Telefono</label>
	    <input type="text" class="form-control" name="phone">
	  </div>
	  <div class="form-group">
	    <label for="code">Codigo de acceso</label>
	    <input type="text" class="form-control" name="code">
	  </div>
		<div class="submit_frame">
	  		<button type="submit" class="btn btn-primary">INGRESAR</button>
		</div>
	</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="jquery-3.5.1.min.js"</script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>

  </body>
</html>
