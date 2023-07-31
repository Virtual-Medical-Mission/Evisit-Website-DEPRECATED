<?php

//checks if a $username exists in the users table of the database
function user_exists($username) {
    global $evisit_db;
    $sql = "SELECT * FROM users WHERE username='";
    $sql.= $username . "'";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);
    $user_count = mysqli_num_rows($result);
    mysqli_free_result($result);

    return !($user_count === 0);

}

//processes registration form data and returns an array of errors
function validate_registration($user_data) {
    $errors = [
        'first_name' => '',
        'last_name' => '',
        'username' => '',
        'gender' => '',
        'DOB' => '',
        'password' => '',
        'confirm_password' => '',
        'present' => false
    ];

    $days_per_month =
        [
        'january' => 31,
        'february' => 28,
        'march' => 31,
        'april' => 30,
        'may' => 31,
        'june' => 30,
        'july' => 31,
        'august' => 31,
        'september' => 30,
        'october' => 31,
        'november' => 30,
        'december' => 31
        ];

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['first_name'])) {
        $errors['first_name'] = 'First name must start with a capital letter and be at least 3 characters long';
        $errors['present'] = true;
    }

    if(!preg_match('/^[A-Z]{1}[a-z]{1}/', $user_data['last_name'])) {
        $errors['last_name'] = "Last name must start with a capital letter, must have no numbers or special characters, and must be at least 2 characters long.";
        $errors['present'] = true;
    }


    if(user_exists($user_data['username'])) {
        $errors['username'] = 'Username already exists, choose another username.';
        $errors['present'] = true;
    } elseif(!preg_match('/^[a-zA-Z0-9]{3,}$/', $user_data['username'])) {
        $errors['username'] = 'Username must be at least 3 characters long and can only contain letters and numbers.';
        $errors['present'] = true;
    }


    if($user_data['gender'] == 'gender') {
        $errors['gender'] = 'Please choose a gender.';
        $errors['present'] = true;
    }

    if($user_data['year'] == 'year' || $user_data['month'] == 'month' || $user_data['day'] == 'day') {
        $errors['DOB'] = 'Please choose a date of birth.';
        $errors['present'] = true;
    } elseif(intval($user_data['day']) > $days_per_month[$user_data['month']]) {
        $errors['DOB'] = 'Invalid date';
        $errors['present'] = true;
    }

    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $user_data['password'])) {
        $errors['password'] = 'Password must be at least 8 characters, must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number, can contain special characters';
        $errors['present'] = true;
    } elseif ($user_data['password'] !== $user_data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
        $errors['present'] = true;
    }

    return $errors;

}
