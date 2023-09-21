<?php

require_once '../private/init.php';
global $evisit_db;
if( is_post_request() ) {

    if( isset($_POST['vitals']) ) {
        $vitals = explode(' ', $_POST['vitals']);
        $spo2 = $vitals[0];
        $heartrate = $vitals[1];
        $BP = $vitals[2];
        $temperature = $vitals[3];
        $ekg = $vitals[4];
        $ip = $vitals[5]; 

        $sql = 'INSERT INTO vitals (oxsat, heartrate, BP, temp, EKG, IP ) VALUES (';
        $sql .= "'" . db_escape($evisit_db, $spo2) . "',";
        $sql .= "'" . db_escape($evisit_db, $heartrate) . "',";
        $sql .= "'" . db_escape($evisit_db, $BP) . "',";
        $sql .= "'" . db_escape($evisit_db, $temperature) . "',";
        $sql .= "'" . db_escape($evisit_db, $ekg) . "',";
        $sql .= "'" . db_escape($evisit_db, $ip) . "')";

        $result = mysqli_query($evisit_db, $sql);
        confirm_result_set($result);
        echo 'Upload Successful';


    }

}
