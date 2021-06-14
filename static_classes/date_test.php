<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');

$today = date("Y-m-d\TH:i:s");
echo $today.'.000Z';
?>
