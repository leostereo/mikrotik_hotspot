<?php
require 'static_classes/ErrorManager.php';


   $mac=$_POST['mac_address'];
   $ip=$_POST['ip_address'];
   $linklogin=$_POST['linkloginonly'];
   $linkorig=$_POST['linkorig'];
   #$error=$_POST['error'];
   $chapid=$_POST['chap-id'];
   #$chapchallenge=$_POST['chap-challenge'];
   $linkloginonly=$_POST['linkloginonly'];
   $linkorigesc=$_POST['linkorigesc'];
   $macesc=$_POST['macesc'];

	$is_customer=$_POST['is_customer'];

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
  <body>

<div class="container">


	<div class="logo_frame">
		<img src="images/logo.png" alt="www.wiber.com"  ><br><br>
	</div>

	<form <form name="login" action="insert.php" method="post">
                     <input type="hidden" name="ip_address" value="<?php echo $ip; ?>" />
                     <input type="hidden" name="mac_address" value="<?php echo $mac; ?>" />
                     <input type="hidden" name="macesc" value="<?php echo $macesc; ?>" />
                     <input type="hidden" name="linkloginonly" value="<?php echo $linkloginonly; ?>" />
                     <input type="hidden" name="linkorigesc" value="<?php echo $linkorigesc; ?>" />
                     <input type="hidden" name="linkorig" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="chap-id" value="<?php echo $chapid; ?>" />

                     <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="link" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="popup" value="true" />
                     <input  style="display:none" type="checkbox" id="is_customer" name="is_customer" <?php if ($is_customer) echo "checked='checked'"; ?>/>


<?php
	if(!$is_customer){

		echo <<<EOT
		<div class="form-group">
			<label for="username">Nombre y Apellido</label>
			<input type="text" class="form-control" name="name" placeholder="Gerardo Martinez">
		</div>
		<div class="form-group">
			<label for="phone">Telefono</label>
			<input type="text" class="form-control" name="phone" placeholder="4223344 o 2612516514">
		</div>
		<div class="form-group">
			<label for="code">Correo</label>
			<input type="text" class="form-control" name="mail" placeholder="emanuel@gmail.com">
		</div>
		<div class="submit_frame">
			<button type="submit" class="btn btn-primary">INGRESAR</button>
		</div>
		<div class="form-group">
			<label for="code">Tengo un código de acceso (opcional)</label>
			<input type="text" class="form-control" name="code" placeholder="codigo alfanumérico">
		</div>
EOT;
	}else{

	echo <<<EOT

		
		<div class="form-group">
			<label for="document">DNI del titular de cuenta Wiber</label>
			<input type="text" class="form-control" name="document">
		</div>
		<div class="submit_frame">
			<button type="submit" class="btn btn-primary">INGRESAR</button>
		</div>
EOT;

}
?>


	</form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="jquery-3.5.1.min.js"</script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>

  </body>
</html>
