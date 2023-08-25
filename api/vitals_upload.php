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
        echo $spo2;
        echo $heartrate;
        echo $BP;
        echo $temperature;
        var_dump($ekg);

    }

}
