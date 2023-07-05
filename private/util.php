<?php

function error_style_logo($errors, $field) {
    if($errors[$field] != '') {
        echo 'style="border-top: 8px solid red; border-bottom: 8px solid red; border-left: 8px solid red;"';
    }
}

function error_style_input($errors, $field) {
    if($errors[$field] != '') {
        echo 'style="border-top: 8px solid red; border-bottom: 8px solid red; border-right: 8px solid red;"';
    }
}