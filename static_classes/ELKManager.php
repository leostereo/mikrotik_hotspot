<?php

class ELKManager
{
    public $revision;
    public $date;
    public $author;



    public static function log_into_elk ($name,$mac_address,$code,$customer,$document,$mail,$phone) {

	

	date_default_timezone_set('UTC');
	$today = date("Y-m-d\TH:i:s").".000Z";

	$endpoint = 'http://172.30.200.113:9200/hotspot/_doc/';
	$params = array(
		'name' => $name,
		'mac' => $mac_address,
		'code' => $code,
		'customer' => $customer,
		'dni' => $document,
		'mail' => $mail,
		'phone' => $phone,
		'timestamp' => $today
	);

	#$url = $endpoint . '?' . http_build_query($params);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $endpoint);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

	ob_start();
	curl_exec($ch);
	ob_end_clean();

    }


}

?>
