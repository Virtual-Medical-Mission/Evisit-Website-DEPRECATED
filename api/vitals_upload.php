<?php

require_once '../private/init.php';

if( is_post_request() ) {

    if( isset($_POST['vitals']) ) {
        $vitals = explode(' ', $_POST['vitals']);
        $spo2 = $vitals[0];
        $heartrate = $vitals[1];
        $BP = $vitals[2];
        $temperature = $vitals[3];
        $ekg = explode(',', $vitals[4]);

        global $evisit_db;
        $sql = "INSERT into vitals (oxsat, heartrate, BP, temp, EKG) VALUES(";
        $sql .= "'" . '1' . "',";
        $sql .= "'" . '1' . "',";
        $sql .= "'" . '1' . "',";
        $sql .= "'" . '1' . "',";
        $sql .= "'" . '1' . "')";

        mysqli_query($evisit_db, $sql);

    }

}
