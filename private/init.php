<?php
//easy and efficient initialization file for files to get their dependencies fast and easily

session_start();
ob_start();

const AI_ENABLED = true;

require_once 'database/db_credentials.php';
require_once 'database/database.php';
require_once 'query.php';
require_once 'server.php';
require_once 'session.php';
require_once 'validate.php';
require_once 'util.php';
require_once 'hpi_questions.php';
require_once 'hpi_validate.php';
require_once 'hpi_ai.php';

$evisit_db = db_connect();
