<?php
require_once 'PEAR2_Net_RouterOS-1.0.0b6.phar';

header('Content-Type: text/plain');

try {
    $util = new Util($client = new Client('172.30.7.2', 'admin', 'password'));

    foreach ($util->setMenu('/log')->getAll() as $entry) {
        echo $entry('time') . ' ' . $entry('topics') . ' ' . $entry('message') . "\n";
    }
} catch (Exception $e) {
    echo 'Unable to connect to RouterOS.';
}


?>
