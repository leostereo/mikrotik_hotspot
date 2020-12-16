<?php
require 'static_classes/UserManager.php';

$username=$_POST['username'];
$document=$_POST['document'];
$phone=$_POST['phone'];
$code=strtoupper($_POST['code']);

$ip_address=$_POST['ip_address'];
$mac_address=$_POST['mac_address'];
$macesc = $_POST['macesc'];
$linkorigesc = $_POST['linkorigesc'];
$linkloginonly = $_POST['linkloginonly'];
$chapid=$_POST['chap-id'];


$file = 'loginlog.txt';
$line = date("Y-m-d H:i:s")." $username $document $code $phone $ip_address $mac_address".PHP_EOL;
#$host = '192.168.89.1';
#$ros_command= "/ip hotspot active login user=user1 password=user123 mac-address=$mac_address ip=$ip_address";
#$shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
#$shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null ' ip address print'";
#system($shell_command, $out);
#$ros_command= "/ip hotspot active print detail";
#$ros_command= "/ip address print";
#$shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
#$out = shell_exec($shell_command);
#$out_arr = explode("\n", $out);


#print_r($_POST);
#echo "var";
#echo "<br>";
#echo "$macesc";
#echo $linkorigesc."<br>";
#echo $linkloginonly."<br>";

	#$matches = preg_match("/$mac_address/",$out);
	#if($matches){
	#	$msg = "Bienvenido $username";
	#}else{
	#	$msg = "hemos tenido un error con su login";
	#}

	file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
	#echo $msg.PHP_EOL;


	$profile = UserManager::get_profile($username,$mac_address,$code);	

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

	<script type="text/javascript">
	<!--
	    function doLogin() {
                <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
		document.sendin.username.value = document.login.username.value;
		document.sendin.password.value = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
		document.sendin.submit();
		return false;
	    }
	//-->
	</script>


		<table width="100%" style="margin-top: 10%;">
		   <tr>
		      <td align="center" valign="middle">
			 </div><br />
			 <table width="240" height="240" style="padding: 0px;" cellpadding="0"
			    cellspacing="0">
			    <tr>
			       <td align="center" valign="bottom" height="175" colspan="2">



<?php
	if($profile=="trial"){

		echo <<<EOT
			<div class="alert alert-success" role="alert">
  				Bienvenido $username , te invitamos a navegar con nuestra cuenta de invitado.
			</div>
		      <a  class="submit_button" href="$linkloginonly?dst=$linkorigesc&username=T-$macesc">a navegar!</a>



EOT;
		
	}elseif($profile=="ESTUDIANTELUJAN"){

		echo <<<EOT
		<form name="login" action="$linkloginonly" method="post" onSubmit="return doLogin()">
			<input type="hidden" name="dst" value="$linkorig" />
			<input type="hidden" name="popup" value="true" />
					
			<div class="alert alert-success" role="alert">
  				Bienvenido $username
			</div>
	
			<table width="100" style="background-color: #ffffff">
				<td><input style="width: 80px" name="username" type="hidden" value="$mac_address"/></td>
				</tr>
				<td><input style="width: 80px" name="password" type="hidden" value="reusablepass"/></td>
				</tr>
				<tr><td> </td>
				<td><input type="submit" class="btn btn-primary" value="a navegar!"/></td>
				</tr>
			</table>
		</form>
EOT;

	}elseif($profile=="PROF_ERR"){
                echo <<<EOT
                        <div class="alert alert-danger" role="alert">
                                El codigo de acceso ingresado no es valido, puedes usar nuestra cuenta de invitado si dejas en blanco el campo "codigo de acceso"
                        </div>
EOT;

	}elseif($profile=="CREATE_ERR") {
                echo <<<EOT
                        <div class="alert alert-danger" role="alert">
                                Hemos tenido un problema con tu cuenta, por favor llama nuestro call center
                        </div>
EOT;

	}


?>

			       </td>
			    </tr>
			 </table>

			 <!-- $(if error) -->
			 <br />
			 <div style="color: #FF8080; font-size: 9px"><?php echo $error; ?></div>
			 <!-- $(endif) -->

		      </td>
		   </tr>
		</table>


<script type="text/javascript">
<!--
  document.login.username.focus();
//-->
</script>

<script src="jquery-3.5.1.min.js"</script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>


</body>
</html>

