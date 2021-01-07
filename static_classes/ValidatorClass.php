<?php

class ValidatorClass {

        private  static $validate_arr = array (
                        "result" => true,
                        "op_code" => true,
                        "error_info" => "",
                        "profile_msg" => "",
                        "info_msg" => ""
                );


	public static function validate ($user, $mac, $code, $customer, $document, $mail, $phone) {
	
	#echo "($user, $mac, $code, $customer, $document, $mail)";


		if(!self::validate_mac($mac)){
				self::$validate_arr['result'] = false;
				self::$validate_arr['op_code'] = false;
				self::$validate_arr['error_info'] = "No hay mac registrada, porfavor reconectate a nuestro punto de acceso";
				self::$validate_arr['info_msg'] = "No hay mac registrada, porfavor reconectate a nuestro punto de acceso";
				self::$validate_arr['profile_msg'] = "MAC_ERR";
				return self::$validate_arr;
		
		}

		if($customer){
			
			if(!self::validate_dni($document)){
				self::$validate_arr['result'] = false;
				self::$validate_arr['op_code'] = false;
				self::$validate_arr['error_info'] = "El dni ingresado no es valido";
				self::$validate_arr['info_msg'] = "El dni ingresado no es valido";
				self::$validate_arr['profile_msg'] = "DNI_ERR";
				return self::$validate_arr;
			}

		}else{
			if($code){
				if(!self::validate_code($code)){
                                	self::$validate_arr['result'] = false;
                                	self::$validate_arr['op_code'] = false;
                                	self::$validate_arr['error_info'] = "El codigo ingresado no es valido";
                                	self::$validate_arr['info_msg'] = "El codigo ingresado no es valido";
                                	self::$validate_arr['profile_msg'] = "CODE_ERR";
					return self::$validate_arr;
				}
			}
                        if(!self::validate_name($user)){
                                self::$validate_arr['result'] = false;
                                self::$validate_arr['op_code'] = false;
                                self::$validate_arr['error_info'] = "Por favor ingresa tu nombre";
                                self::$validate_arr['info_msg'] = "Por favor ingresa tu nombre";
                                self::$validate_arr['profile_msg'] = "NAME_ERR";
                        }
                        if(!self::validate_mail($mail)){
                                self::$validate_arr['result'] = false;
                                self::$validate_arr['op_code'] = false;
                                self::$validate_arr['error_info'] = "El mail ingresado no es valido";
                                self::$validate_arr['info_msg'] = "El mail ingresado no es valido";
                                self::$validate_arr['profile_msg'] = "MAIL_ERR";
                        }
                        if(!self::validate_phone($phone)){
                                self::$validate_arr['result'] = false;
                                self::$validate_arr['op_code'] = false;
                                self::$validate_arr['error_info'] = "El telefono ingresado no es valido";
                                self::$validate_arr['info_msg'] = "El telefono ingresado no es valido";
                                self::$validate_arr['profile_msg'] = "PHONE_ERR";
                        }

		}


	
	
		return self::$validate_arr;
		
	}

	private static function validate_dni ($document){
		#echo $document;		
		return ((strlen($document) > 6)&&(is_numeric($document))) ? true : false;
			
	}

	private static function validate_phone ($phone){
		#echo $document;		
		return ((strlen($phone) > 6)&&(is_numeric($phone))) ? true : false;
			
	}

	private static function validate_mac ($mac){
			
		return  (preg_match('/^(?:(?:[0-9a-f]{2}[\:]{1}){5}|(?:[0-9a-f]{2}[-]{1}){5}|(?:[0-9a-f]{2}){5})[0-9a-f]{2}$/i', $mac)) ? true : false;
			
	}

	private static function validate_name ($user){
			
		return  (strlen($user) > 4) ? true : false;
			
	}
	
	private static function validate_mail ($mail){

		return  (filter_var($mail, FILTER_VALIDATE_EMAIL)) ? true : false;
			
	}
	private static function validate_code ($code){
			
		return  (strlen($code) > 10) ? true : false;
			
	}
	

}


?>
