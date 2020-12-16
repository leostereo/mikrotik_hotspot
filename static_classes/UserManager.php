<?php

class UserManager
{

    public static function get_profile($user, $mac, $code) {
	
		if($code){
			return self::create_user($mac,$code);
		}else{
			return "trial";
		}

    }

    private static function profile_resolver($code) {
	$profile_arr = array(
		"ESTUDIANTELUJAN" => "ESTUDIANTELUJAN",
		"ADMINPROF" => "ADMINPROF"
	);		
	
		if ($profile_arr[$code]){
			return $profile_arr[$code];
		}
			return false;	

	}

	private static function create_user($mac,$code){
		#$mac = "60:8F:5C:B8:75:4F";

			$profile = self::profile_resolver($code);

			if(!$profile){
				return "PROF_ERR";
			}

		$host = '172.30.7.2';
                $ros_command= "ip hotspot user add name=$mac mac-address=$mac password=reusablepass limit-uptime=00:25:00";
                $shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";

                $out_str = shell_exec($shell_command);
                $out_str = shell_exec($shell_command);
                return preg_match('/already have user with this name/',$out_str)? $profile: "CREATE_ERR";

	}	

}

?>
