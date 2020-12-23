<?php

require('routeros-api/routeros_api.class.php');

class UserManager
{

	private  static $profile_arr = array (
			"op_code" => true,
			"error_info" => "",
			"profile_msg" => "",
			"info_msg" => ""		
		);

    public static function get_profile($user, $mac, $code, $customer, $document) {

	
		if($customer){
			return self::create_customer_user($mac,$document);
		}elseif($code){
			return self::create_code_user($mac,$code);
		}else{
			self::$profile_arr['profile_msg']="trial";
			return self::$profile_arr;
		}

    }

    private static function delete_user($mac) {

	$host = '172.30.7.2';
	$ros_command= "ip hotspot user remove \"$mac\"";
	$shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
	$out_str = shell_exec($shell_command);
	#echo $ros_command;
	#echo "<br>";
	#echo $out_str;
	return true;
    }

    private static function user_exist($mac) {

	$host = '172.30.7.2';
	$ros_command= "ip hotspot user add name=$mac mac-address=$mac password=reusablepass";
	$shell_command= "sshpass -p 'api_user' ssh api_user\@$host -p22000 -o StrictHostKeyChecking=no  -o UserKnownHostsFile=/dev/null '".$ros_command."'";
	$out_str = shell_exec($shell_command);
	#echo $ros_command;
	#echo "<br>";
	#echo "out :".$out_str;
	return preg_match('/already have user with this name/',$out_str)? true: false;
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

	private static function add_user_to_hotspot ($mac,$srv_arr){

	#echo "mac $mac\n";
	#print_r($srv_arr);

	$API = new RouterosAPI();
	$API->debug = false;
	$API->timeout = 1;
	$API->attempts = 3;
	$peers_nok=array();
	$peers_ok=array();
	$peers_nok_list='';
	$host= "172.30.7.2";

			ob_start();
			if ($API->connect($host, 'api_user', 'api_user')) {
			   $peers_nok=array();
			#   $API->write('/ip/hotspot/user/getall');

			   $API->comm("/ip/hotspot/user/add", array(
			      "name"     => $mac,
			      "mac-address"     => $mac,
			      "password" => "reusablepass",
			      "profile"  => $srv_arr['profile'],
			   ));


			   $API->disconnect();

			}else{
				self::$profile_arr['op_code']=false;
				self::$profile_arr['info_msg']="Verifiquue conxion con hostpot api";
				self::$profile_arr['profile_msg']="APIHOT_ERR";
				return false;
			}

			
			if (self::user_exist($mac)) {
				return true;
			}else {
				self::$profile_arr['op_code']=false;
				self::$profile_arr['error_info']="El usuario no ha podido ser creado";
				self::$profile_arr['profile_msg']="APICREATE_ERR";
				return false;

			}	

	}


	private static function create_customer_user($mac,$document){

			$profile_arr = array();
        		$ch = curl_init();
        		curl_setopt($ch, CURLOPT_URL, "https://malbec.wiber.com.ar/api/consulta-dni?token=1f7462bd97fc60d0746674811a587531&dni=".$document);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        		$output = curl_exec($ch);
	
				if($errno = curl_errno($ch)) {

					$error_message = curl_strerror($errno);
					self:$profile_arr['op_code']=false;
					self::$profile_arr['error_info']=$error_message;
					self::$profile_arr['profile_msg']="APIANA_ERR";

				}else{

					$user_arr = json_decode($output,true);
					
						if($user_arr['status']){

							$srv_arr['profile']="WIBERCUSTOMER";								
													
							if(self::add_user_to_hotspot($mac, $srv_arr)){
								self::$profile_arr['info_msg']="Bienvenido {$user_arr['nombre']}";
								self::$profile_arr['profile_msg']="CUST_OK";
							}

						}else{
							self::$profile_arr['op_code']=false;
							self::$profile_arr['error_info']="El documento $document no es valido";
							self::$profile_arr['profile_msg']="DOC_ERR";
						}
				}

        	curl_close($ch);
		return self::$profile_arr;

	}

	private static function create_code_user($mac,$code){


		if(($mac)&&($code)){
		#$mac = "60:8F:5C:B8:75:4F";
			$profile = self::profile_resolver($code);
		

			if(!$profile){
				self::$profile_arr['op_code']=false;
				self::$profile_arr['error_info']="El codigo de acceso ingresado no es valido";
				self::$profile_arr['profile_msg']="COD_ERR";
				return self::$profile_arr;
			}

                        $srv_arr['profile']=$profile;


			if(self::add_user_to_hotspot($mac, $srv_arr)){
				self::$profile_arr['info_msg']="Bienvenido, ya puedes navegar con tu cuenta de estudiante";
				self::$profile_arr['profile_msg']=$profile;
			}

		return self::$profile_arr;

		}

	}	

}

?>
