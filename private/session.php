<?php

//stores patient user data in the session storage
function patient_set($user_data, $action) {
    session_regenerate_id();
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

//deletes patient user data from the session storage
function patient_destroy($user_data) {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['username']);
    unset($_SESSION['gender']);
    unset($_SESSION['DOB']);
    unset($_SESSION['role']);
    session_destroy();

}

function require_login($redirect_url) {
    if(!isset($_SESSION['username'])) {
        redirect_to($redirect_url);
    }
}

function hpi_init() {
    if(!isset($_SESSION['hpi'])) {
        $_SESSION['hpi'] = [
            'page' => 1,
            'tribe' => '',
            'test' => '',
            'test2' => ''
        ];
    }
}

function hpi_destroy() {
    unset($_SESSION['hpi']);
}