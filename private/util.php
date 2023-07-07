<?php

//spits out the style attribute for the logo part of a boostrap form group for when form data does not pass validation
function error_style_logo($errors, $field) {
    if($errors[$field] != '') {
        echo 'style="border-top: 8px solid red; border-bottom: 8px solid red; border-left: 8px solid red;"';
    }
}

//spits out the style attribute for the input part of a boostrap form group for when form data does not pass validation
function error_style_input($errors, $field) {
    if($errors[$field] != '') {
        echo 'style="border-top: 8px solid red; border-bottom: 8px solid red; border-right: 8px solid red;"';
    }
}

function vmm_banner($message) {
    echo
    '<div class="container-fluid" style="background-color: #05445e">
        <div class="row">
            <div class="col-md-6 text-center">
                <img src="/private/assets/img/logo.png" width="300px" height="170px" alt="logo" />
            </div>
            <div class="col-md-6">
                <div class="text-white align-text-bottom fs-1" style="padding-top: 50px">'.$message. '</div>
            </div>
        </div>
    </div>';
}

//crint : conditional print
function crint($check, $condition, $output) {
    if($check == $condition) {
        return $output;
    }
}