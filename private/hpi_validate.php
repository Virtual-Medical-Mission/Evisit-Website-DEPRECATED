<?php

require_once 'init.php';
//IMPORTANT MANUAL

/*
This file is for storing all the HPI page validation functions
At the end the loadValidation function loads a validation function based on the page number
*/



function v_pageStart($HPI_data, $HPI_AI = null) {
    $errors = [
        'language' => '',
        'tribe' => '',
        'location' => '',
        'start_date' => '',
        'present' => false
    ];

    if(AI_ENABLED) {

        if($HPI_data['language'] == '') {
            $errors['language'] = 'Please select a language';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['language'] = $HPI_data['language'];
        }

        if($HPI_data['tribe'] == '') {
            $errors['tribe'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['tribe'] = $HPI_data['tribe'];
        }

        if(!validateAnswer('Enter a valid location that exists:', $HPI_data['location'], $HPI_AI)) {
            $errors['location'] = 'Please enter a valid location';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['location'] = $HPI_data['location'];
        }

        if($HPI_data['start_date'] == '') {
            $errors['start_date'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['start_date'] = $HPI_data['start_date'];
        }


    } else {
        if($HPI_data['language'] == '') {
            $errors['language'] = 'Please select a language';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['language'] = $HPI_data['language'];
        }

        if($HPI_data['tribe'] == '') {
            $errors['tribe'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['tribe'] = $HPI_data['tribe'];
        }

        if($HPI_data['location'] == '') {
            $errors['location'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['location'] = $HPI_data['location'];
        }

        if($HPI_data['start_date'] == '') {
            $errors['start_date'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['start_date'] = $HPI_data['start_date'];
        }
    }


    return $errors;

}

function v_page2($HPI_data, $HPI_AI = null) {
    $errors = [
        'medical_conditions' => '',
        'medications' => '',
        'surgeries' => '',
        'allergies' => '',
        'hospitalized' => '',
        'present' => false
    ];

    if(AI_ENABLED) {

        if(!validateAnswer('Do you have any chronic medical conditions? If so, please list them, if you dont write N/A:', $HPI_data['medical_conditions'], $HPI_AI)) {
            $errors['medical_conditions'] = 'Please enter valid medical conditions, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['medical_conditions'] = $HPI_data['medical_conditions'];
        }

        if(!validateAnswer('Do you take any medications? If so, please list them, if you dont write N/A:', $HPI_data['medications'], $HPI_AI)) {
            $errors['medications'] = 'Please enter valid medications, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['medications'] = $HPI_data['medications'];
        }

        if(!validateAnswer('Have you had any surgeries in the past? If so, please list them, if you dont write N/A:', $HPI_data['surgeries'], $HPI_AI)) {
            $errors['surgeries'] = 'Please enter valid surgeries, or write N?A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['surgeries'] = $HPI_data['surgeries'];
        }

        if(!validateAnswer('Do you have any allergies? If so, please list them, if you dont write N/A:', $HPI_data['allergies'], $HPI_AI)) {
            $errors['allergies'] = 'Please enter valid allergies, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['allergies'] = $HPI_data['allergies'];
        }

        if($HPI_data['hospitalized'] == '') {
            $errors['hospitalized'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['hospitalized'] = $HPI_data['hospitalized'];
        }


    } else {

        if($HPI_data['medical_conditions'] == '') {
            $errors['medical_conditions'] = 'Write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['medical_conditions'] = $HPI_data['medical_conditions'];
        }

        if($HPI_data['medications'] == '') {
            $errors['medications'] = 'Write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['medications'] = $HPI_data['medications'];
        }

        if($HPI_data['surgeries'] == '') {
            $errors['surgeries'] = 'Write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['surgeries'] = $HPI_data['surgeries'];
        }

        if($HPI_data['allergies'] == '') {
            $errors['allergies'] = 'Write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['allergies'] = $HPI_data['allergies'];
        }

        if($HPI_data['hospitalized'] == '') {
            $errors['hospitalized'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['hospitalized'] = $HPI_data['hospitalized'];
        }

    }




    return $errors;

}

function v_page3($HPI_data, $HPI_AI = null) {
    $errors = [
        'clean_water' => '',
        'transportation' => '',
        'immunizations' => '',
        'dietary_restrictions' => '',
        'present' => false
    ];

    if(AI_ENABLED) {

        if($HPI_data['clean_water'] == '') {
            $errors['clean_water'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['clean_water'] = $HPI_data['clean_water'];
        }

        if(!validateAnswer('What is your primary method of transportation?', $HPI_data['transportation'], $HPI_AI)) {
            $errors['transportation'] = 'Please enter valid transportation, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['transportation'] = $HPI_data['transportation'];
        }

        if($HPI_data['immunizations'] == '') {
            $errors['immunizations'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['immunizations'] = $HPI_data['immunizations'];
        }

        if(!validateAnswer('Do you have any dietary restrictions? If so, please list them, if you dont write N/A:', $HPI_data['dietary_restrictions'], $HPI_AI)) {
            $errors['dietary_restrictions'] = 'Please enter valid dietary restrictions, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['dietary_restrictions'] = $HPI_data['dietary_restrictions'];
        }


    } else {

        if($HPI_data['clean_water'] == '') {
            $errors['clean_water'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['clean_water'] = $HPI_data['clean_water'];
        }

        if($HPI_data['transportation'] == '') {
            $errors['transportation'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['transportation'] = $HPI_data['transportation'];
        }

        if($HPI_data['immunizations'] == '') {
            $errors['immunizations'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['immunizations'] = $HPI_data['immunizations'];
        }

        if($HPI_data['dietary_restrictions'] == '') {
            $errors['dietary_restrictions'] = 'Type N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['dietary_restrictions'] = $HPI_data['dietary_restrictions'];
        }

    }



    return $errors;

}

function v_page4($HPI_data, $HPI_AI = null) {
    $errors = [
        'smoke_rate' => '',
        'alcohol_rate' => '',
        'drug_rate' => '',
        'physical_activities' => '',
        'family_history' => '',
        'present' => false
    ];

    if(AI_ENABLED) {

        if($HPI_data['smoke_rate'] == '') {
            $errors['smoke_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['smoke_rate'] = $HPI_data['smoke_rate'];
        }

        if($HPI_data['alcohol_rate'] == '') {
            $errors['alcohol_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['alcohol_rate'] = $HPI_data['alcohol_rate'];
        }

        if($HPI_data['drug_rate'] == '') {
            $errors['drug_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['drug_rate'] = $HPI_data['drug_rate'];
        }

        if(!validateAnswer('Do you engage in physical activities? If so, please list them, write N?A if none:', $HPI_data['physical_activities'], $HPI_AI)) {
            $errors['physical_activities'] = 'Please enter valid physical activities, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['physical_activities'] = $HPI_data['physical_activities'];
        }

        if(!validateAnswer('Do you have any family history of diseases? If so, please list them, write N?A if none:', $HPI_data['family_history'], $HPI_AI)) {
            $errors['family_history'] = 'Please enter valid family history, or write N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['family_history'] = $HPI_data['family_history'];
        }

    } else {

        if($HPI_data['smoke_rate'] == '') {
            $errors['smoke_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['smoke_rate'] = $HPI_data['smoke_rate'];
        }

        if($HPI_data['alcohol_rate'] == '') {
            $errors['alcohol_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['alcohol_rate'] = $HPI_data['alcohol_rate'];
        }

        if($HPI_data['drug_rate'] == '') {
            $errors['drug_rate'] = 'Please select an option';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['drug_rate'] = $HPI_data['drug_rate'];
        }

        if($HPI_data['physical_activities'] == '') {
            $errors['physical_activities'] = 'Type N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['physical_activities'] = $HPI_data['physical_activities'];
        }

        if($HPI_data['family_history'] == '') {
            $errors['family_history'] = 'Type N/A if none';
            $errors['present'] = true;
        } else {
            $_SESSION['hpi']['family_history'] = $HPI_data['family_history'];
        }

    }




    return $errors;

}

function loadValidation($hpi_page, $HPI_data, $HPI_AI = null) {
    switch($hpi_page) {
        case 1:
            return v_pageStart($HPI_data, $HPI_AI);
        case 2:
            return v_page2($HPI_data, $HPI_AI);
        case 3:
            return v_page3($HPI_data, $HPI_AI);
        case 4:
            return v_page4($HPI_data, $HPI_AI);
    }
}