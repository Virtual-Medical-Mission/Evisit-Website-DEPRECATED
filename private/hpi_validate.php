<?php

//IMPORTANT MANUAL

/*
This file is for storing all the HPI page validation functions
At the end the loadValidation function loads a validation function based on the page number
*/



function v_pageStart($HPI_data) {
    $errors = [
        'language' => '',
        'tribe' => '',
        'location' => '',
        'start_date' => '',
        'present' => false
    ];

    if(AI_ENABLED) {



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

function v_page2($HPI_data) {
    $errors = [
        'medical_conditions' => '',
        'medications' => '',
        'surgeries' => '',
        'allergies' => '',
        'hospitalized' => '',
        'present' => false
    ];

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


    return $errors;

}

function v_page3($HPI_data) {
    $errors = [
        'clean_water' => '',
        'transportation' => '',
        'immunizations' => '',
        'dietary_restrictions' => '',
        'present' => false
    ];

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


    return $errors;

}

function v_page4($HPI_data) {
    $errors = [
        'smoke_rate' => '',
        'alcohol_rate' => '',
        'drug_rate' => '',
        'physical_activities' => '',
        'family_history' => '',
        'present' => false
    ];

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


    return $errors;

}

function loadValidation($hpi_page, $HPI_data) {
    switch($hpi_page) {
        case 1:
            return v_pageStart($HPI_data);
        case 2:
            return v_page2($HPI_data);
        case 3:
            return v_page3($HPI_data);
        case 4:
            return v_page4($HPI_data);
    }
}