<?php
	$mac = "60:8F:5C:B8:75:4F";
        $host = '172.30.7.2';
        $ros_command= "ip hotspot user add name=$mac mac-address=$mac password=reusablepass";
        $shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
        $out_str = shell_exec($shell_command);
        #echo $ros_command;
        #echo "<br>";
        echo $out_str;
     
	echo  preg_match('/already have user with this name/',$out_str)? true: false;



?>
