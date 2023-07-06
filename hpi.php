<?php
require_once 'private/init.php';
require_login('login.php');
echo 'Dev Message: Login/Registration was successful';
echo 'Session Storage:';
var_dump($_SESSION);