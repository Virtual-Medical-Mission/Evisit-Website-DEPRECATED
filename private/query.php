<?php

require_once 'private/init.php';

//processes registration form and registers a user in the database
function register_user($user_data) {
    global $evisit_db;
    $errors = validate_registration($user_data);
    if($errors['present']) {
        return $errors;
    }

    $hashed_password = password_hash($user_data['password'], PASSWORD_BCRYPT);
    $DOB = $user_data['year'] . '-' . $user_data['month'] . '-' . $user_data['day'];
    $sql = "INSERT INTO users (first_name, last_name, username, gender, DOB, password) VALUES (";
    $sql .= "'" . db_escape($evisit_db, $user_data['first_name']) . "',";
    $sql .= "'" . db_escape($evisit_db, $user_data['last_name']) . "',";
    $sql .= "'" . db_escape($evisit_db, $user_data['username']) . "',";
    $sql .= "'" . db_escape($evisit_db, $user_data['gender']) . "',";
    $sql .= "'" . db_escape($evisit_db, $DOB) . "',";
    $sql .= "'" . db_escape($evisit_db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);

    patient_set($user_data, 'register');

    return $errors;



}

function login_user($user_login) {

    global $evisit_db;

    $sql = "SELECT * FROM users WHERE username='";
    $sql .= db_escape($evisit_db, $user_login['username']) . "'";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);
    $fetched_data = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if($fetched_data) {
        if(password_verify($user_login['password'], $fetched_data['password'])) {
            patient_set($fetched_data, 'login');
            return true;
        }
    }

    return false;


}