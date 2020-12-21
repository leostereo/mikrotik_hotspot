<?php
require('routeros-api/routeros_api.class.php');

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
   $API->write('/ip/hotspot/user/print/where', array(
      "name"     => "peter"

));
   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);
   $API->disconnect();

}

	print_r($ARRAY);

?>

