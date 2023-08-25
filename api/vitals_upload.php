<?php

require_once '../private/init.php';

if( is_post_request() ) {

    if( isset($_POST['vitals']) ) {
        var_dump($_POST['vitals']);
//        $vitals = explode(' ', $_POST['EKG']);
//        $spo2 = $vitals[0];
//        $heartrate = $vitals[1];
//        $BP = $vitals[2];
//        $temperature = $vitals[3];
//        $ekg = explode(',', $vitals[4]);

    }

}
