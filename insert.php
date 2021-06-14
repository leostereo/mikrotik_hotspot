<?php
require 'static_classes/UserManager.php';
require 'static_classes/ELKManager.php';

$name=$_POST['name'];
$document=$_POST['document'];
$customer=$_POST['is_customer'] ? true : false;
$phone=$_POST['phone'];
$mail=$_POST['mail'];
$code=strtoupper($_POST['code']);
#$code="ESTUDIANTELUJAN";

$ip_address=$_POST['ip_address'];
$mac_address=$_POST['mac_address'];
#$mac_address="deadbeefaabb";

$macesc = $_POST['macesc'];
$linkorigesc = $_POST['linkorigesc'];
$linkorig = $_POST['linkorig'];
$linkloginonly = $_POST['linkloginonly'];
$chapid=$_POST['chap-id'];


	$file = 'loginlog.txt';
	$line = date("Y-m-d H:i:s")." $name | $document | $phone | $mail | $ip_address | $mac_address | $code".PHP_EOL;
	file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
	#echo $msg.PHP_EOL;

	$profile_arr = UserManager::get_profile($name,$mac_address,$code,$customer,$document,$mail,$phone);	
	ELKManager::log_into_elk($name,$mac_address,$code,$customer,$document,$mail,$phone);

	#print_r($_POST);
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

	if($profile_arr['profile_msg']=="trial"){

		echo <<<EOT
			<div class="alert alert-success" role="alert">
  				Bienvenido $username , te invitamos a navegar con nuestra cuenta de invitado.
			</div>
		      <a  class="submit_button" href="$linkloginonly?dst=$linkorigesc&username=T-$macesc">a navegar!</a>

EOT;
		
	}elseif($profile_arr['profile_msg']=="ESTUDIANTELUJAN"){

		echo <<<EOT
		<form name="login" action="$linkloginonly" method="post" onSubmit="return doLogin()">
			<input type="hidden" name="dst" value="$linkorig" />
			<input type="hidden" name="popup" value="true" />
					
			<div class="alert alert-success" role="alert">
  				{$profile_arr['info_msg']}
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

	}elseif($profile_arr['profile_msg']=="CUST_OK"){
                echo <<<EOT

		<form name="login" action="$linkloginonly" method="post" onSubmit="return doLogin()">
			<input type="hidden" name="dst" value="$linkorig" />
			<input type="hidden" name="popup" value="true" />
					
			<div class="alert alert-success" role="alert">
  				{$profile_arr['info_msg']}
			</div>
	
			<table width="100" style="background-color: #ffffff">
				<td><input style="width: 80px" name="username" type="hidden" value="$document"/></td>
				</tr>
				<td><input style="width: 80px" name="password" type="hidden" value="reusablepass"/></td>
				</tr>
				<tr><td> </td>
				<td><input type="submit" class="btn btn-primary" value="a navegar!"/></td>
				</tr>
			</table>
		</form>

EOT;

	}else {
		$alert = $profile_arr['op_code'] ? "success" : "danger"	;
		$msg = $profile_arr['op_code'] ? $profile_arr['info_msg'] : $profile_arr['profile_msg'].": ".$profile_arr['error_info'];
		
                echo <<<EOT
                        <div class="alert alert-$alert" role="alert">
                                $msg
                        </div>
		      <a  class="submit_button" href="$linkloginonly">Volver</a>
EOT;

	}

?>

			       </td>
			    </tr>
			 </table>

			 <!-- $(if error) -->
			 <br />
		      </td>
		   </tr>
		</table>

<?php #print_r($profile_arr);?>

<script type="text/javascript">
<!--
  document.login.username.focus();
//-->
</script>

<script src="jquery-3.5.1.min.js"</script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"</script>


</body>
</html>

