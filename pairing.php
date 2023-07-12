<?php

require_once 'private/init.php';
global $evisit_db;
echo 'HPI Form submission was successful!';

$sql = "SELECT * FROM hpi WHERE username='";
$sql .= db_escape($evisit_db, 'JaneDoe') . "'";
$sql .= " ORDER BY id DESC LIMIT 1";
$result = mysqli_query($evisit_db, $sql);
confirm_result_set($result);
$fetched_data = mysqli_fetch_assoc($result);
mysqli_free_result($result);

echo '<br><br>Here is the data you submitted:<br><br>';

var_dump($fetched_data);





$user_ip = get_client_ip();

echo $user_ip;