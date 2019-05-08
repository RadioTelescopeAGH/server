<?php

define('INPUT_PATH', 'php://input');
define('MAX_INPUT_SIZE', 1024*100);

if($_SERVER['HTTP_HOST'] == 'localhost') {
    $dbName = 'shield';
    $dbUser = 'root';
    $dbPass = '';
    $dbHost = 'localhost';
}
else {
    include '../../prodSecretData.php';
}