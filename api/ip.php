<?php

require_once "../private/init.php";

if (is_post_request())

    if($_POST['auth_key'] == api_ip_key) {
        echo client_ipv4();
    } else {
        echo 'INVALID AUTH KEY';
    }

}