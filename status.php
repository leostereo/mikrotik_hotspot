<?php

$ip = $_POST['ip'];
$bytes_in = $_POST['bytes_in'];
$bytes_out = $_POST['bytes_out'];
$uptime = $_POST['uptime'];
$time_left = $_POST['time_left'];
$refresh = $_POST['refresh'];
$logout_link = $_POST['logout_link'];
$hostname = $_POST['hostname'];
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
<form action="<?php echo $logout_link;?>" name="logout">
	<table border="1" class="table">
		<br><div style="text-align: center;">Estado de tu conexion</div><br>
		<tr><td align="right">IP address:</td><td><?php echo $ip;?></td></tr>
		<tr><td align="right">bytes subida/bajada:</td><td><?php echo "$bytes_in / $bytes_out";?></td></tr>
		<tr><td align="right">Tiempo usado/restante:</td><td><?php echo "$uptime / $time_left";?></td></tr>
		<tr><td align="right">status refresh:</td><td><?php echo $refresh;?></td>

	</table>
	<br>
                <div class="submit_frame">
			<a href="<?php echo "http://$hostname/status";?>" class="btn btn-primary">Refrescar</a>
			<input type="submit" class="btn btn-primary" value="DESCONECTAR">
                </div>

</form>

</td>
</table>

</div>


<script src="jquery-3.5.1.min.js"</script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>


</body>
</html>

