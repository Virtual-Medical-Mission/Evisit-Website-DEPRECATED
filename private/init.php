<?php
//easy and efficient initialization file for files to get their dependencies fast and easily

session_start();
ob_start();


const private_path = __DIR__ . '/';
const api_ip_key = "5a3604d0c47ae9ec0eb59bf5f509899d935403c61ec4cdcf564b3e14467e0f699474101ff9b91b53581d673c6b2243eb2b8e40ae021f206b0fe4274d260d9bdda78e272bfb6a6442d872c3f0fa582cb693bd0cf9e842b999a06631304fcced8bf6d37cc1a787c2f0e5eb305e060928838b5ccfc8ab9b161d90b8e0eb5fa75ecec5618b7383cdf484da947ddab25d058ee902eb43af9dec0f27fbbc0aec8dae01";

require_once private_path . 'database/db_credentials.php';
require_once private_path .'database/database.php';
require_once private_path . 'query.php';
require_once private_path . 'server.php';
require_once private_path . 'session.php';
require_once private_path . 'validate.php';
require_once private_path . 'util.php';
require_once private_path . 'ai.php';



$evisit_db = db_connect();