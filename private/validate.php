<?php

function validate_registration($user_data) {
    $errors = [
        'first_name' => '',
        'last_name' => '',
        'gender' => '',
        'password' => '',
        'confirm_password' => '',
        'present' => false
    ];

    if(!preg_match('/^[A-Z]{1}[a-z]{2}/', $user_data['first_name'])) {
        $errors['first_name'] = 'First name must start with a capital letter and be at least 3 characters long';
        $errors['present'] = true;
    }

    if(!preg_match('/^[A-Z]{1}[a-z]{1}/', $user_data['last_name'])) {
        $errors['last_name'] = "Last name must start with a capital letter, must have no numbers or special characters, and must be at least 2 characters long.";
        $errors['present'] = true;
    }

    if(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $user_data['password'])) {
        $errors['password'] = 'Password must be at least 8 characters, must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number, can contain special characters';
        $errors['present'] = true;
    } elseif ($user_data['password'] !== $user_data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
        $errors['present'] = true;
    }

    if($errors['present']) {
        return $errors;
    } else {
        return false;
    }


}
