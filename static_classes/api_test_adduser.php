<?php
require('routeros-api/routeros_api.class.php');
#$ros_command= "ip hotspot user add name=$mac mac-address=$mac password=reusablepass limit-uptime=00:25:00";

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
      "name"     => "leo",
      "mac-address"     => "00:00:00:00:00:00",
      "password" => "pass",
      #"profile"  => "WIBERCUSTOMER",
      
   ));


   $API->disconnect();

}else{
	echo "can not connect";
}


?>

