<?php
		$mac = "60:8F:5C:B8:75:4F";
                $host = '172.30.7.2';
                $ros_command= "ip hotspot user add name=$mac mac-address=$mac password=reusablepass limit-uptime=00:25:00";
                $shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
                $shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";

                $out_str = shell_exec($shell_command);
		echo preg_match('/already have user with this name/',$out_str)? "yes": "no";	


		exit;


                #$shell_command= "ifconfig";
                echo "shell_command\n";
                echo $shell_command."\n";
                #system($shell_command, $out);
		echo "shell_exec\n";
                $out_str = shell_exec($shell_command);
                echo $out_str;
		$ros_command="ip hotspot user print where name=$mac";
                $shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
		echo "comando \n".$shell_command."\n";

                $out_str = shell_exec($shell_command);
	

                echo "salida resultado\n $out_str";

		echo preg_match("/$mac/",$out_str) ?  "yes" :  "no";

		


?>
