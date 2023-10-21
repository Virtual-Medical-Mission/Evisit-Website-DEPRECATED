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
        $ip = client_ipv4();
        
        
        $sql = 'INSERT INTO vitals (oxsat, heartrate, BP, temp, EKG, ip ) VALUES (';
        $sql .= "'" . db_escape($evisit_db, $spo2) . "',";
        $sql .= "'" . db_escape($evisit_db, $heartrate) . "',";
        $sql .= "'" . db_escape($evisit_db, $BP) . "',";
        $sql .= "'" . db_escape($evisit_db, $temperature) . "',";
        $sql .= "'" . db_escape($evisit_db, $ekg) . "',";
        $sql .= "'" . db_escape($evisit_db, $ip) . "')";
        
        $result = mysqli_query($evisit_db, $sql);
        confirm_result_set($result);

        $vid = mysqli_insert_id($evisit_db);

        echo 'goodsend';

        //Get the last appointment id that has the ip
        $sql2 = "SELECT * FROM appointments WHERE ip = '" . db_escape($evisit_db, $ip) . "'ORDER BY id DESC LIMIT 1";
        $result2 = mysqli_query($evisit_db, $sql2);
        $apid = mysqli_fetch_assoc($result2)['id'];

        //Update the appointment with the vitals id
        $sql3 = "UPDATE appointments SET vid = '" . db_escape($evisit_db, $vid) . "' WHERE id = '" . db_escape($evisit_db, $apid) . "'";
        $result = mysqli_query($evisit_db, $sql3);
        confirm_result_set($result);

        echo 'Vitals have been successfully linked to user';
    }

}
