<?php
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>mikrotik hotspot > login</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />
<link rel="stylesheet" href="./css/style.css">
</head>
<body>


<table width="100%" style="margin-top: 10%;">
   <tr>
      <td align="center" valign="middle">
         <table width="80%" height="240" style="border: 1px solid #cccccc; padding: 0px;" cellpadding="0"
            cellspacing="0">
            <tr>
               <td align="center" valign="bottom" height="185" colspan="2">
		<img src="images/logo.png" alt="www.wiber.com"  height="100"><br><br>
                  <form name="login" action="insert.php" method="post" onSubmit="return doLogin()">
                     <input type="hidden" name="ip_address" value="<?php echo $ip; ?>" />
                     <input type="hidden" name="mac_address" value="<?php echo $mac; ?>" />
                     <input type="hidden" name="macesc" value="<?php echo $macesc; ?>" />
                     <input type="hidden" name="linkloginonly" value="<?php echo $linkloginonly; ?>" />
                     <input type="hidden" name="linkorigesc" value="<?php echo $linkorigesc; ?>" />
                     <input type="hidden" name="chap-id" value="<?php echo $chapid; ?>" />

                     <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="link" value="<?php echo $linkorig; ?>" />
                     <input type="hidden" name="popup" value="true" />

                     <table width="100" style="background-color: #ffffff">
                        <tr>
                           <td align="right">usuario</td>
                           <td><input style="width: 120px" name="username" type="text" /></td>
                        </tr>
                        <tr>
                           <td align="right">documento</td>
                           <td><input style="width: 120px" name="document" type="text" /></td>
                        <tr>
                           <td align="right">telefono</td>
                           <td><input style="width: 120px" name="phone" type="text" /></td>
                        <tr>
                           <td align="right">codigo de acceso</td>
                           <td><input style="width: 120px" name="code" type="text" /></td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td><input type="submit" value="INGRESAR" /></td>
                        </tr>
                     </table>
                  </form>
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
</body>
</html>
