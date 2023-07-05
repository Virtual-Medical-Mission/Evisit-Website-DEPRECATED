<?php

require_once 'private/init.php';

function register_user($user_data) {

    global $evisit_db;
    $hashed_password = password_hash($user_data['password'], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (full_name, gender, DOB, password) VALUES (";
    $sql .= "'" . db_escape($evisit_db, $user_data['full_name']) . "',";
    $sql .= "'" . db_escape($evisit_db, $user_data['gender']) . "',";
    $sql .= "'" . db_escape($evisit_db, $user_data['DOB']) . "',";
    $sql .= "'" . db_escape($evisit_db, $hashed_password) . "'";
    $sql .= ")";
    $result = mysqli_query($evisit_db, $sql);
    confirm_result_set($result);




}