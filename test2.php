<?php
use PEAR2\Net\RouterOS;

require_once 'PEAR2_Net_RouterOS-1.0.0b6.phar';
//Use any PEAR2_Net_RouterOS class from here on

try {
    $client = new RouterOS\Client('192.168.89.1', 'api_user', 'api_user');
} catch (Exception $e) {
    die('Unable to connect to the router.');
    //Inspect $e if you want to know details about the failure.
}

$responses = $client->sendSync(new RouterOS\Request('/ip/arp/print'));

foreach ($responses as $response) {
    if ($response->getType() === RouterOS\Response::TYPE_DATA) {
        echo 'IP: ', $response->getProperty('address'),
        ' MAC: ', $response->getProperty('mac-address'),
        "\n";
    }
}
