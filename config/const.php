<?php

define('INPUT_PATH', 'php://input');
define('MAX_INPUT_SIZE', 1024*100);

if($_SERVER['HTTP_HOST'] == 'localhost') {
    $dbName = 'shield';
    $dbUser = 'root';
    $dbPass = '';
    $dbHost = 'localhost';

    $_shieldAddres = 'localhost:3000';
    $_shieldToken = 'loacl_shield_token';
}
else {
    include '../../prodSecretData.php';
}