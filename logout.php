<?php

$ip = $_POST['ip'];
$bytes_in = $_POST['bytes_in'];
$bytes_out = $_POST['bytes_out'];
$uptime = $_POST['uptime'];
$time_left = $_POST['time_left'];
$refresh = $_POST['refresh'];
$logout_link = $_POST['logout_link'];
$hostname = $_POST['hostname'];
$mac = $_POST['mac'];
$login_link = $_POST['login_link'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
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

<table width="100%" height="100%">

<tr>
<td align="center" valign="middle">
<b>Hasta pronto</b> <br><br>
<table class="table" border="1">  
<tr><td align="right">IP</td><td><?php echo $ip;?></td></tr>
<tr><td align="right">direccion mac</td><td><?php echo $mac?></td></tr>
<tr><td align="right">tiempo de sesion</td><td><?php echo $uptime;?></td></tr>
<tr><td align="right">tiempo restante</td><td><?php echo $time_left;?></td></tr>
<tr><td align="right">bytes up/down:</td><td><?php echo "$bytes_in / $bytes_out";?></td></tr>
</table>
<br>
<form action="<?php echo $login_link;?>" name="login">
<input type="submit" class="btn btn-primary" value="Conectar">
</form>
</td>
</table>



</div>


<script src="jquery-3.5.1.min.js"</script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>


</body>
</html>

