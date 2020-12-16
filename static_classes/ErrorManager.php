<?php

class ErrorManager
{
    public $revision;
    public $date;
    public $author;

    public static function get_error($error) {
	
		if($error=="invalid username or password"){
			return "usuario o password incorrecto";
		}elseif (preg_match('/has reached uptime limit/', $error)){
			return "se ha terminado el tiempo de uso del servicio";
		}elseif (preg_match('/this MAC address is not yours/', $error)){
			return "La mac address intrucida fue clonada";
		}else{
			$file = 'loginlog.txt';
			$line = date("Y-m-d H:i:s")." ".$error.PHP_EOL;
        		file_put_contents($file, $line, FILE_APPEND | LOCK_EX);
			return false;

		}

    }


}

?>
