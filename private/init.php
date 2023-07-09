<?php
//easy and efficient initialization file for files to get their dependencies fast and easily

session_start();
ob_start();

const AI_ENABLED = true;

const private_path = __DIR__ . '/';

require_once private_path . 'database/db_credentials.php';
require_once private_path .'database/database.php';
require_once private_path . 'query.php';
require_once private_path . 'server.php';
require_once private_path . 'session.php';
require_once private_path . 'validate.php';
require_once private_path . 'util.php';
require_once private_path . 'hpi_questions.php';
require_once private_path . 'hpi_validate.php';
require_once private_path . 'ai.php';



$evisit_db = db_connect();
