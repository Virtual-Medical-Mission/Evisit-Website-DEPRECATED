<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        require 'test.php';
        break;


}