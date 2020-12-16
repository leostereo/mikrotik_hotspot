<?php

require(dirname(__FILE__).'/routeros-api/routeros_api.class.php');

$host = '192.168.89.1';

$API = new RouterosAPI();
$API->debug = false;
$API->timeout = 1;
$API->attempts = 3;

if ($API->connect($host, 'api_user', 'api_user')) {

   $API->comm("ip/hotspot/active/login/", array(
      "user"     => "user",
      "password" => "user123",
      "mac-address" => "C0:17:4D:B3:F7:1F",
      "ip"  => "50.1.1.199",
   ));

   $READ = $API->read();
   $READ = $API->read(false);
   $ARRAY = $API->parseResponse($READ);

   print_r($ARRAY);

   $API->disconnect();

unset($API);

}

?>
