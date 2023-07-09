<?php

require_once 'private/init.php';

//processes registration form and registers a user in the database
function register_user($user_data): array
{
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

//Checks if a user logs in to a username with the correct password and then sets the session variables for auth purposes
function login_user($user_login): bool
{

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

//Submits all the HPI data into the database and destroys the HPI session storage
function submit_hpi($hpi_data): void
{

    global $evisit_db;

    $sql = "INSERT INTO hpi (username, language, tribe, location, start_date, medical_conditions, medications, surgeries, allergies, hospitalized, clean_water, transportation, immunizations, dietary_restrictions, smoke_rate, alcohol_rate, drug_rate, physical_activities, family_history) VALUES (";
    $sql .= "'" . db_escape($evisit_db, $_SESSION['username']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['language']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['tribe']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['location']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['start_date']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['medical_conditions']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['medications']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['surgeries']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['allergies']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['hospitalized']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['clean_water']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['transportation']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['immunizations']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['dietary_restrictions']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['smoke_rate']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['alcohol_rate']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['drug_rate']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['physical_activities']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hpi_data['family_history']) . "'";
    $sql .= ")";

    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);

    hpi_destroy();

}