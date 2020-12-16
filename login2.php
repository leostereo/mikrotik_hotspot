<?php
	$mac=$_POST['mac'];
	$ip=$_POST['ip'];
	$username=$_POST['username'];
	$linklogin=$_POST['link-login'];
	$linkorig=$_POST['link-orig'];
	$error=$_POST['error'];
?>
<html>
<body>
<h2>Logintest.php Test</h2>
Mac: <?php echo $mac ?><br>
IP: <?php echo $ip ?><br>
Username: <?php echo $username ?><br>
Link-login: <?php echo $linklogin ?><br>
Link-orig: <?php echo $linkorig ?><br>
Error: <?php echo $error ?><br>

                        <form id="loginForm" class="form-horizontal" role="form" action="insert.php" method="post">
                            <input type="hidden" name="ip_address" value="<?php echo $ip; ?>"/>
                            <input type="hidden" name="mac_address" value="<?php echo $mac; ?>"/>
                            <input type="hidden" name="popup" value="true"/>

                            <div class="form-group">
                                <label for="inputLogin" class="col-sm-2 control-label">Login</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputLogin" name="username"
                                           placeholder="Login" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputPassword" name="document"
                                           placeholder="document" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">OK</button>
                                </div>
                            </div>
                        </form>



</body>
</html>
