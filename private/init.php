<?php
//easy and efficient initialization file for files to get their dependencies fast and easily

session_start();
ob_start();

const PRIVATE_PATH = __DIR__;

//smart relative path based loading allows any file in this project to get all the dependencies from init.php
require_once PRIVATE_PATH . '\database\db_credentials.php';
require_once PRIVATE_PATH . '\database\database.php';
require_once PRIVATE_PATH . '\server.php';

$evisit_db = db_connect();
