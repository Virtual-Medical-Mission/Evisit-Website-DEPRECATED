<?php

function v_pageStart($HPI_data) {
    $errors = [
        'tribe' => '',
        'present' => false
    ];

    if($HPI_data['tribe'] == '') {
        $errors['tribe'] = 'Please select an option';
        $errors['present'] = true;
    }

    if(!$errors['present']) {
        $_SESSION['hpi']['tribe'] = $HPI_data['tribe'];
    }

    return $errors;

}

function v_page2($HPI_data) {
    $errors = [
        'test' => '',
        'present' => false
    ];

    if($HPI_data['test'] == '') {
        $errors['test'] = 'Please select an option';
        $errors['present'] = true;
    }

    if(!$errors['present']) {
        $_SESSION['hpi']['test'] = $HPI_data['test'];
    }

    return $errors;

}

function v_page3($HPI_data) {
    $errors = [
        'test2' => '',
        'present' => false
    ];

    if($HPI_data['test2'] == '') {
        $errors['test2'] = 'Please select an option';
        $errors['present'] = true;
    }

    if(!$errors['present']) {
        $_SESSION['hpi']['test2'] = $HPI_data['test2'];
    }

    return $errors;

}

function loadValidation($hpi_page, $HPI_data) {
    switch($hpi_page) {
        case 1:
            return v_pageStart($HPI_data);
        case 2:
            return v_page2($HPI_data);
        case 3:
            return v_page3($HPI_data);;
    }
}