<?php

//stores patient user data in the session storage
function patient_set($user_data, $action) : void {
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
function patient_destroy($user_data) : void {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['username']);
    unset($_SESSION['gender']);
    unset($_SESSION['DOB']);
    unset($_SESSION['role']);
    session_destroy();

}

function require_login($redirect_url) : void {
    if(!isset($_SESSION['username'])) {
        redirect_to($redirect_url);
    }
}

//Session storage object that temporarily will store HPI form data when a user does the HPI form
function hpi_init() : void {
    if(!isset($_SESSION['hpi'])) {
        $_SESSION['hpi'] = [
            'page' => 1,
            'page_end' => 4,
            'language' => 'english',
            'tribe' => '',
            'location' => '',
            'start_date' => date('Y-m-d'),
            'medical_conditions' => '',
            'medications' => '',
            'surgeries' => '',
            'allergies' => '',
            'hospitalized' => 'no',
            'clean_water' => '',
            'transportation' => '',
            'immunizations' => '',
            'dietary_restrictions' => '',
            'smoke_rate' => '',
            'alcohol_rate' => '',
            'drug_rate' => '',
            'physical_activities' => '',
            'family_history' => '',

        ];
    }
}

//Destroy HPI form data from session storage if the user is finished with the HPI form
function hpi_destroy() : void {
    unset($_SESSION['hpi']);
}

//Makes sure that some random person can't do the HPI form unless they have auth to do it
function require_hpi_session($redirect_url) : void {
    if(!isset($_SESSION['hpi'])) {
        redirect_to($redirect_url);
    }
}