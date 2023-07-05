<?php

function patient_set($user_data) {
    session_regenerate_id();
    $_SESSION['first_name'] = $user_data['first_name'];
    $_SESSION['last_name'] = $user_data['last_name'];
    $_SESSION['gender'] = $user_data['gender'];
    $_SESSION['DOB'] = $user_data['DOB'];
    $_SESSION['role'] = $user_data['patient'];
}

function patient_destroy($user_data) {
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    unset($_SESSION['gender']);
    unset($_SESSION['DOB']);
    unset($_SESSION['role']);
    session_destroy();

}