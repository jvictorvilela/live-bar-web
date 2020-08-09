<?php

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'transmissao-ign';

$mysql = new mysqli($db_host, $db_user, $db_password, $db_name);
$mysql->set_charset('UTF-8');

?>