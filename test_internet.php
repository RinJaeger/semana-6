<?php
$url = "http://www.google.com";
$response = file_get_contents($url);

if ($response === FALSE) {
    die("No se puede acceder a Internet");
}
echo "Acceso a Internet confirmado";
?>
