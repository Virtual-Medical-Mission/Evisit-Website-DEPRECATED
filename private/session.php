<?php

//stores patient user data in the session storage and starts an appointment
function set_current_user($user_data, $action, $uid, $db) : void {
    session_regenerate_id();
    $_SESSION['uid'] = $uid;
    $_SESSION['first_name'] = $user_data['first_name'];
    $_SESSION['last_name'] = $user_data['last_name'];
    $_SESSION['username'] = $user_data['username'];
    $_SESSION['gender'] = $user_data['gender'];
    if($action == 'register') {
        $_SESSION['DOB'] = $user_data['year'] . '-' . $user_data['month'] . '-' . $user_data['day'];
    } elseif($action == 'login') {
        $_SESSION['DOB'] = $user_data['DOB'];
    }
    $_SESSION['role'] = 'patient';
}

function start_appointment($uid, $db) : void {
    $sql = "INSERT INTO appointments (uid, vid, checkedin, checkedout, doctor, ip) VALUES (";
    $sql .= "'" . db_escape($db, $uid) . "', ";
    $sql .= "'" . -1 . "', ";
    $sql .= "'" . db_escape($db, date('Y-m-d H:i:s')) . "', ";
    $sql .= "'" . 'N/A' . "', ";
    $sql .= "'" . 'N/A' . "', ";
    $sql .= "'" . db_escape($db, client_ipv4()) . "')";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $_SESSION['apid'] = mysqli_insert_id($db);

}

//deletes patient user data from the session storage
function patient_destroy() : void {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['username']);
    unset($_SESSION['gender']);
    unset($_SESSION['DOB']);
    unset($_SESSION['role']);
    unset($_SESSION['apid']);
    session_destroy();

}

//requires a login for main pages
function require_login($redirect_url) : void {
    if(!isset($_SESSION['username'])) {
        redirect_to($redirect_url);
    }
}

//used for staffportal pages, requires a login and a staff role
function require_staffrole($redirect_url) : void {
    if($_SESSION['role'] !== 'staff') {
        redirect_to($redirect_url);
    }
}


